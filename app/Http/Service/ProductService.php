<?php

namespace App\Http\Service;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductTag;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * @param $data
     * @return void
     */
    public function storeCategory($data)
    {

        $title = $data['title'];

        try {
            DB::beginTransaction();
            $category = Category::create([
                'title' => $title
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollback();
        }

    }

    /**
     * @param Category $category
     * @param $data
     * @return void
     */
    public function updateCategory(Category $category, $data)
    {

        $title = $data['title'];

        try {

            DB::beginTransaction();
                $category->update([
                   'title' => $title
                ]);
            DB::commit();

        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param Category $category
     * @return void
     */
    public function deleteCategory(Category $category)
    {
        $category->delete();
    }

    /**
     * @param $data
     * @return void
     */
    public function storeTag($data) {
        $title = $data['title'];

        try {
            DB::beginTransaction();

            $tag = Tag::create([
                'title' => $title
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param $data
     * @param Tag $tag
     * @return void
     */
    public function updateTag($data, Tag $tag) {

        $title = $data['title'];

        try {
            DB::beginTransaction();

            $tag->update([
               'title' => $title
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function deleteTag(Tag $tag) {
        $tag->delete();
    }

    /**
     * @param $data
     * @return void
     */
    public function storeShop($data) {

        $title = $data['title'];
        $address = $data['address'];

        try {
            DB::beginTransaction();
            $shop = Shop::create([
               'title' => $title,
               'address' => $address
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param Shop $shop
     * @param $data
     * @return void
     */
    public function updateShop(Shop $shop, $data) {

        $title = $data['title'];
        $address = $data['address'];

        try {
            DB::beginTransaction();

            $shop->update([
                'title' => $title,
                'address' => $address
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param Shop $shop
     * @return void
     */
    public function deleteShop(Shop $shop) {
        $shop->delete();
    }

    /**
     * @param $data
     * @return void
     */
    public function storeColor($data) {

        $title = $data['title'];
        $color_id = $data['color_id'];

        try {
            DB::beginTransaction();

            $color = Color::create([
               'title' => $title,
               'color_id' => $color_id
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }


    }

    /**
     * @param Color $color
     * @param $data
     * @return void
     */
    public function updateColor(Color $color, $data) {

        $title = $data['title'];
        $color_id = $data['color_id'];

        try {
            DB::beginTransaction();

            $color->update([
                'title' => $title,
                'color_id' => $color_id
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param Color $color
     * @return void
     */
    public function deleteColor(Color $color) {
        $color->delete();
    }

    /**
     * @param $image
     * @return bool
     */
    public function getImagePath($image) {
        $image_path = Storage::disk('public')->put('images', $image);
        return $image_path;
    }

    /**
     * @param $data
     * @return void
     */
    public function storeProduct($data) {

        $title = $data['title'];
        $image = $this->getImagePath($data['image']);
        $category_id = $data['category_id'];
        $price = $data['price'];
        $avaible = $data['avaible'];
        $desc = $data['desc'];
        $shop_id = $data['shop_id'];
        $tags = $data['tag_ids'];
        $colors = $data['colors'];
        try {

            DB::beginTransaction();

            $product = Product::create([
               'title' => $title,
               'image' => $image,
               'category_id' => $category_id,
               'price' => $price,
               'old_price' => 0,
               'shop_id' => $shop_id,
               'avaible' => $avaible,
               'desc' => $desc
            ]);

            $product->tags()->attach($tags);
            $product->colors()->attach($colors);

            DB::commit();

        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    /**
     * @param Product $product
     * @param $data
     * @return void
     */
    public function updateProduct(Product $product, $data) {

        $title = $data['title'];
        $image = $this->getImagePath($data['image']);
        $category_id = $data['category_id'];
        $price = $data['price'];
        $avaible = $data['avaible'];
        $desc = $data['desc'];
        $shop_id = $data['shop_id'];
        $tags = $data['tag_ids'];
        $colors = $data['colors'];
        $old_price = $data['old_price'];
        try {

            DB::beginTransaction();

            $product->update([
                'title' => $title,
                'image' => $image,
                'category_id' => $category_id,
                'price' => $price,
                'old_price' => $old_price,
                'shop_id' => $shop_id,
                'avaible' => $avaible,
                'desc' => $desc
            ]);

            $product->tags()->sync($tags);
            $product->colors()->sync($colors);

            DB::commit();

        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }

    }

    public function deleteProduct(Product $product) {

        ProductTag::where('product_id', $product->id)->delete();
        ProductColor::where('product_id', $product->id)->delete();

        $product->delete();
    }

}
