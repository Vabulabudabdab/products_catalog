<?php


use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\V0\IndexController::class, 'index'])->name('index');

Route::post('/search', [App\Http\Controllers\V0\IndexController::class, 'search'])->name('index.search');

Route::group(['prefix' => 'auth'], function () {

    Route::get('/register', [\App\Http\Controllers\V0\IndexController::class, 'register'])->name('register');
    Route::get('/login', [\App\Http\Controllers\V0\IndexController::class, 'login'])->name('login');
    Route::get('/logout', [\App\Http\Controllers\V0\AuthController::class, 'logout'])->name('logout');

    Route::post('/register/post', [\App\Http\Controllers\V0\AuthController::class, 'register_post'])->name('register.post');
    Route::post('/login/post', [\App\Http\Controllers\V0\AuthController::class, 'login_post'])->name('login.post');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', [\App\Http\Controllers\V0\IndexController::class, 'admin_index'])->name('admin.index');

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', [\App\Http\Controllers\V0\CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [\App\Http\Controllers\V0\CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/show/{category}', [\App\Http\Controllers\V0\CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/edit/{category}', [\App\Http\Controllers\V0\CategoryController::class, 'edit'])->name('admin.categories.edit');

        Route::post('/store', [\App\Http\Controllers\V0\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::patch('/update/{category}', [\App\Http\Controllers\V0\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/delete/{category}', [\App\Http\Controllers\V0\CategoryController::class, 'delete'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [\App\Http\Controllers\V0\TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/create', [\App\Http\Controllers\V0\TagController::class, 'create'])->name('admin.tags.create');
        Route::get('/show/{tag}', [\App\Http\Controllers\V0\TagController::class, 'show'])->name('admin.tags.show');
        Route::get('/edit/{tag}', [\App\Http\Controllers\V0\TagController::class, 'edit'])->name('admin.tags.edit');

        Route::post('/store', [\App\Http\Controllers\V0\TagController::class, 'store'])->name('admin.tags.store');
        Route::patch('/update/{tag}', [\App\Http\Controllers\V0\TagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/delete/{tag}', [\App\Http\Controllers\V0\TagController::class, 'delete'])->name('admin.tags.delete');
    });

    Route::group(['prefix' => 'shops'], function () {

        Route::get('/', [\App\Http\Controllers\V0\ShopController::class, 'index'])->name('admin.shops.index');
        Route::get('/create', [\App\Http\Controllers\V0\ShopController::class, 'create'])->name('admin.shops.create');
        Route::get('/show/{shop}', [\App\Http\Controllers\V0\ShopController::class, 'show'])->name('admin.shops.show');
        Route::get('/edit/{shop}', [\App\Http\Controllers\V0\ShopController::class, 'edit'])->name('admin.shops.edit');

        Route::post('/store', [\App\Http\Controllers\V0\ShopController::class, 'store'])->name('admin.shops.store');
        Route::patch('/update/{shop}', [\App\Http\Controllers\V0\ShopController::class, 'update'])->name('admin.shops.update');
        Route::delete('/delete/{shop}', [\App\Http\Controllers\V0\ShopController::class, 'delete'])->name('admin.shops.delete');

    });

    Route::group(['prefix' => 'colors'], function () {

        Route::get('/', [\App\Http\Controllers\V0\ColorController::class, 'index'])->name('admin.colors.index');
        Route::get('/create', [\App\Http\Controllers\V0\ColorController::class, 'create'])->name('admin.colors.create');
        Route::get('/show/{color}', [\App\Http\Controllers\V0\ColorController::class, 'show'])->name('admin.colors.show');
        Route::get('/edit/{color}', [\App\Http\Controllers\V0\ColorController::class, 'edit'])->name('admin.colors.edit');

        Route::post('/store', [\App\Http\Controllers\V0\ColorController::class, 'store'])->name('admin.colors.store');
        Route::patch('/update/{color}', [\App\Http\Controllers\V0\ColorController::class, 'update'])->name('admin.colors.update');
        Route::delete('/delete/{color}', [\App\Http\Controllers\V0\ColorController::class, 'delete'])->name('admin.colors.delete');

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', [\App\Http\Controllers\V0\ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [\App\Http\Controllers\V0\ProductController::class, 'create'])->name('admin.products.create');
        Route::get('/show/{product}', [\App\Http\Controllers\V0\ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/edit/{product}', [\App\Http\Controllers\V0\ProductController::class, 'edit'])->name('admin.products.edit');

        Route::post('/store', [\App\Http\Controllers\V0\ProductController::class, 'store'])->name('admin.products.store');
        Route::patch('/update/{product}', [\App\Http\Controllers\V0\ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/delete/{product}', [\App\Http\Controllers\V0\ProductController::class, 'delete'])->name('admin.products.delete');

    });

});
