<?php

namespace App\Http\Controllers\V0;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SearchProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{

    public function index()
    {

        $products = Product::all();
        $tags = Tag::all();
        $categories = Category::all();
        $shops = Shop::all();
        $colors = Color::all();

        return view('index', compact('products', 'tags', 'categories', 'shops', 'colors'));
    }

    public function search(SearchProductRequest $request)
    {
        $data = $request->validated();
        $tags = Tag::all();
        $categories = Category::all();
        $shops = Shop::all();
        $colors = Color::all();
        $tag_ids = $data['tag_ids'];

        $tag_products = ProductTag::where('tag_id', $data['tag_ids'])->get();

        if ($data['min'] <= $data['max']) {
            Cookie::make('product_name', $data['product_name'], 360);


            $result = Product::where('title', "LIKE", "%{$data['product_name']}%")->whereHas('tags', function ($b) use ($tag_ids, $data) {
                $b->whereIn('tag_id', $tag_ids);
            })->get();

            return view('search', compact('tags', 'categories', 'shops', 'colors', 'result', 'tag_products', 'tag_ids'));

        } else {
            return redirect()->back()->with('error_price', 'Минимальное значение не может превышать максимальное');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function admin_index()
    {
        return view('admin.index');
    }

}
