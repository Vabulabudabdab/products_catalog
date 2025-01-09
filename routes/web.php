<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(
    base_path('\routes\V0\routes.php')
);
