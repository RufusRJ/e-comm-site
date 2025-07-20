<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ... (this method is already here)
        $products = Product::latest()->get(); 
        return view('home', compact('products'));
    }

    // Add this new method
    public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }
}