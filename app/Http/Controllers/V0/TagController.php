<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\TagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends BaseController {

    public function index() {
        $tags = Tag::paginate(9);

        return view('admin.tags.index', compact('tags'));
    }

    public function create() {
        return view('admin.tags.create');
    }

    public function edit(Tag $tag) {
        return view('admin.tags.edit', compact('tag'));
    }

    public function show(Tag $tag) {
        return view('admin.tags.show', compact('tag'));
    }

    public function store(TagRequest $request) {
        $data = $request->validated();

        $this->productService->storeTag($data);

        return redirect()->route('admin.tags.index');
    }

    public function update(UpdateTagRequest $request, Tag $tag) {
        $data = $request->validated();

        $this->productService->updateTag($data, $tag);

        return redirect()->route('admin.tags.index');
    }

    public function delete(Tag $tag) {
        $this->productService->deleteTag($tag);

        return redirect()->route('admin.tags.index');
    }

}
