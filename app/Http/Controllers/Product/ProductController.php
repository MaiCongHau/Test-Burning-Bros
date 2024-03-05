<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     *
     * @return void
     */
    public function list()
    {
        return view('product.list');
    }
}
