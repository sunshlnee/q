<?php

namespace App\Http\Controllers;

use App\Models\Product\Category;
use App\Models\Product\Product;

class PageController extends Controller
{
    public function __invoke()
    {
        $products = Product::all()->where('recommended', 1);
        return view('home', compact('products'));
    }
}
