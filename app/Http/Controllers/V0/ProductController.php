<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Tag;
use function Laravel\Prompts\alert;

class ProductController extends BaseController {

    public function index() {
        $products = Product::paginate(9);
        return view('admin.products.index', compact('products'));
    }

    public function create() {

        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $shops = Shop::all();

        return view('admin.products.create', compact('categories', 'tags', 'colors', 'shops'));
    }

    public function edit(Product $product) {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        $shops = Shop::all();
        return view('admin.products.edit', compact('categories', 'tags', 'colors', 'shops', 'product'));
    }

    public function show(Product $product) {

        return view('admin.products.show', compact('product'));
    }

    public function store(CreateProductRequest $request) {

        $data = $request->validated();

        $this->productService->storeProduct($data);

        return redirect()->route('admin.products.index');
    }

    public function update(Product $product, UpdateProductRequest $request) {
        $data = $request->validated();

        $this->productService->updateProduct($product, $data);

        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product) {
        $this->productService->deleteProduct($product);
        return redirect()->route('admin.products.index');
    }

}
