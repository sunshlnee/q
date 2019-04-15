<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizesController extends Controller
{
    public function index()
    {
        $sizes = Size::paginate(30);

        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate(['title' => 'required|unique:sizes|max:255']);
        $size = Size::create($fields);
        return redirect()->route('admin.sizes.show', compact('size'));
    }

    public function show(Size $size)
    {
        return view('admin.sizes.show', compact('size'));
    }

    public function edit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    public function update(Request $request, Size $size)
    {
        $fields = $request->validate(['title' => 'required|unique:sizes|max:255']);
        $size->update($fields);
        return redirect()->route('admin.sizes.show', $size);
    }

    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('admin.sizes.index');
    }
}
