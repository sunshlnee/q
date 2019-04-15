<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('cabinet.profile.index', compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        $fields = $request->validate([
            'name'      => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email'     => 'nullable|string|max:255',
            'password'  => 'nullable|string|max:255',
        ]); 
        $user->edit($fields);
        return redirect()->back();
    }
}
