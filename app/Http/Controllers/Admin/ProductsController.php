<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Services\SearchService;
use App\Models\Product\Category;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use App\Http\Requests\Admin\Product\Product\StoreRequest;
use App\Http\Requests\Admin\Product\Product\UpdateRequest;

class ProductsController extends Controller
{
    private $service;
    private $searchService;

    public function __construct(SearchService $searchService, ProductService $service)
    {
        $this->service = $service;
        $this->searchService = $searchService;
    }
    public function index(Request $request)
    {
        $query = $this->searchService->productsSearch($request);
        $products = $query->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.products.create', compact('parents'));
    }

    public function store(StoreRequest $request)
    {
        $product = $this->service->create($request);
        return redirect()->route('admin.products.show', $product);
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product,
            'sizes' => $product->sizes()->pluck('title', 'id')->all(),
            'colors' => $product->colors()->pluck('title', 'id')->all(),
            'fabrics' => $product->fabrics()->pluck('title', 'id')->all(),
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit.edit', compact('product'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product = $this->service->edit($product, $request);
        return redirect()->route('admin.products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');   
    }

    public function recommend(Product $product)
    {
        $product->switchRecommended($product->recommended);
        return redirect()->route('admin.products.show', $product);   
    }

    public function photosForm(Product $product)
    {
        return view('admin.products.edit.photos', compact('product'));
    }

    public function photos(Request $request, Product $product)
    {
        try {
            $this->service->addPhotos($product, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.products.show', $product);
    }

    public function photoPreviewForm(Product $product)
    {
        return view('admin.products.edit.preview', compact('product'));
    }

    public function photoPreview(Request $request, Product $product)
    {
        try {
            $this->service->addPreviewPhoto($product, $request['file']);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.products.show', $product);
    }
}
