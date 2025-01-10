<?php

namespace App\Http\Controllers\V0;

use App\Http\Service\AuthService;
use App\Http\Service\ProductService;

class BaseController {

    protected $authService;
    protected $productService;
    public function __construct(AuthService $authService, ProductService $productService) {

        $this->authService = $authService;
        $this->productService = $productService;

    }


}
