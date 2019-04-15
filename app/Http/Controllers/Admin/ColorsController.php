<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(30);

        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate(['title' => 'required|unique:colors|max:255']);
        $color = Color::create($fields);
        return redirect()->route('admin.colors.show', compact('color'));
    }

    public function show(Color $color)
    {
        return view('admin.colors.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $fields = $request->validate(['title' => 'required|unique:colors|max:255']);
        $color->update($fields);
        return redirect()->route('admin.colors.show', $color);
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors.index');
    }
}
