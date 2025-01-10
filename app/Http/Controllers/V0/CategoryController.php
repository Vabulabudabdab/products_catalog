<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends BaseController {

    public function index() {
        $categories = Category::paginate(9);
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function show(Category $category) {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function store(CategoryRequest $request) {
        $data = $request->validated();

        $this->productService->storeCategory($data);

        return redirect()->route('admin.categories.index');
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $data = $request->validated();

        $this->productService->updateCategory($category, $data);

        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $category)
    {
        $this->productService->deleteCategory($category);

        return redirect()->route('admin.categories.index');
    }

}
