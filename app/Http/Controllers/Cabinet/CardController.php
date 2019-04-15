<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function index()
    {
        $products = Auth::user()->cards()->get();
        return view('cabinet.card.index', compact('products'));
    }

    public function remove(Product $product)
    {
        $user = User::findOrFail(Auth::id());
        $user->removeFromCard($product->id); 
        return redirect()->back();
    }
}
