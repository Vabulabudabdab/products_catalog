<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\ColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;

class ColorController extends BaseController {

    public function index() {
        $colors = Color::paginate(9);
        return view('admin.colors.index', compact('colors'));
    }

    public function create() {
        return view('admin.colors.create');
    }

    public function show(Color $color) {
        return view('admin.colors.show', compact('color'));
    }

    public function edit(Color $color) {
        return view('admin.colors.edit', compact('color'));
    }

    public function store(ColorRequest $request) {
        $data = $request->validated();

        $this->productService->storeColor($data);

        return redirect()->route('admin.colors.index');
    }

    public function update(Color $color, UpdateColorRequest $request) {

        $data = $request->validated();

        $this->productService->updateColor($color, $data);

        return redirect()->route('admin.colors.index');
    }

    public function delete(Color $color) {

        $this->productService->deleteColor($color);

        return redirect()->route('admin.colors.index');
    }

}
