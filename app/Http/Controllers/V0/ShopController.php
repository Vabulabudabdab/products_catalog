<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\ShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\Models\Tag;

class ShopController extends BaseController {

    public function index() {
        $shops = Shop::paginate(9);
        return view('admin.shops.index', compact('shops'));
    }

    public function create() {
        return view('admin.shops.create');
    }

    public function show(Shop $shop) {
        return view('admin.shops.show', compact('shop'));
    }

    public function edit(Shop $shop) {
        return view('admin.shops.edit', compact('shop'));
    }

    public function store(ShopRequest $request) {
        $data = $request->validated();

        $this->productService->storeShop($data);

        return redirect()->route('admin.shops.index');
    }

    public function update(Shop $shop, UpdateShopRequest $request) {
        $data = $request->validated();

        $this->productService->updateShop($shop, $data);

        return redirect()->route('admin.shops.index');
    }

    public function delete(Shop $shop) {
        $this->productService->deleteShop($shop);

        return redirect()->route('admin.shops.index');
    }

}
