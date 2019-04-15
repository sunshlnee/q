<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(30);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate(['title' => 'required|unique:brands|max:255']);
        $brand = Brand::create($fields);
        return redirect()->route('admin.brands.show', compact('brand'));
    }

    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $fields = $request->validate(['title' => 'required|unique:brands|max:255']);
        $brand->update($fields);
        return redirect()->route('admin.brands.show', $brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
