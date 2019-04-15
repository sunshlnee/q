<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Fabric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FabricsController extends Controller
{
    public function index()
    {
        $fabrics = Fabric::paginate(30);

        return view('admin.fabrics.index', compact('fabrics'));
    }

    public function create()
    {
        return view('admin.fabrics.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate(['title' => 'required|unique:fabrics|max:255']);
        $fabric = Fabric::create($fields);
        return redirect()->route('admin.fabrics.show', compact('fabric'));
    }

    public function show(Fabric $fabric)
    {
        return view('admin.fabrics.show', compact('fabric'));
    }

    public function edit(Fabric $fabric)
    {
        return view('admin.fabrics.edit', compact('fabric'));
    }

    public function update(Request $request, Fabric $fabric)
    {
        $fields = $request->validate(['title' => 'required|unique:fabrics|max:255']);
        $fabric->update($fields);
        return redirect()->route('admin.fabrics.show', $fabric);
    }

    public function destroy(Fabric $fabric)
    {
        $fabric->delete();
        return redirect()->route('admin.fabrics.index');
    }
}
