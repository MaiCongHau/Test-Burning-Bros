<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Location\LocationRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $locationRepo;

    public function __construct(ProductRepositoryInterface $productRepo, LocationRepositoryInterface $locationRepo)
    {
        $this->productRepo = $productRepo;
        $this->locationRepo = $locationRepo;
    }

    /**
     *
     * @return void
     */
    public function list(Request $request)
    {
        $products = $this->productRepo->getProduct($request);
        $locations = $this->locationRepo->getAll();
        $data = [
            'products' => $products,
            'locations' => $locations
        ];

        return view('product.list', $data);
    }
}
