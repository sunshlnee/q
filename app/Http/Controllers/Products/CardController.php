<?php

namespace App\Http\Controllers\Products;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function remove($productId)
    {
        Auth::user()->removeFromCard($productId);
    }

    public function add($productId)
    {
        try {
            Auth::user()->addToCard($productId);
        } catch (\DomainException $e) {
            return $e->getMessage();
        }

    }

    public function getCount()
    {
        return Auth::user()->cartCount();
    }
}   
