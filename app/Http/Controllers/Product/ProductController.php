<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Location\LocationRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
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
            'locations' => $locations,
            'urlCart' => route('product.showAllItem'),
        ];

        return view('product.list', $data);
    }

    public function cartAdd(Request $request)
    {
        $cart = [
            'id' => $request->product_id,
            'name' => $request->product_name,
            'qty' => 1,
            'price' => $request->product_price,
            'weight' => 0,
        ];
        Cart::add($cart);
        // update cart count
        $display = [
            'count' => Cart::count(),
            'view' => view('includes.cart.item')->render()
        ];

        return $display;
    }

    public function cartUpdate($rowId, $qty)
    {
        Cart::update($rowId, $qty);
        $item = Cart::get($rowId);

        $display = [
            'subtotal' => Cart::subtotal(),
            'totalprice' => number_format($item->qty * $item->price),
        ];

        return $display;
    }

    public function cartDelete($rowId)
    {
        Cart::remove($rowId);
        $display = [
            'subtotal' => Cart::subtotal(),
        ];

        return $display;
    }

    public function showAllItem()
    {
       return view('product.shopping-cart');
    }
}
