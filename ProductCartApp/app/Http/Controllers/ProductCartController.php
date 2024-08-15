<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductCartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cartItems = Cart::with('product')->get();
        return view('productcart.index', compact('products', 'cartItems'));
    }

    public function store(Request $request)
    {
        Product::create($request->only('name', 'description', 'price'));
        return redirect()->back();
    }

    public function addToCart($productId)
    {
        Cart::create(['product_id' => $productId]);
        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
