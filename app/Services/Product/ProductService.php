<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Models\Product\PhotoPreview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function create(Request $request)
    {
        $product = Product::create([
            'code' => $request['code'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'brand_id' => $request['brand_id'],
        ]);
        $product->setSlug();
        $product->setSizes($request->sizes);
        $product->setColors($request->colors);
        $product->setFabrics($request->fabrics);
        $product->saveOrFail();

        return $product;
    }

    public function edit(Product $product, Request $request)
    {
        $product->update([
            'code' => $request['code'],
            'price' => $request['price'],
        ]);
        $product->setSizes($request->sizes);
        $product->setFabrics($request->fabrics);
        $product->setColors($request->colors);
        $product->saveOrFail();
        return $product;
    }

    public function addPhotos(Product $product, $request)
    {
        DB::transaction(function () use ($request, $product) {
            foreach ($request['files'] as $file) {
                $filename = str_random(20) . '.' . $file->extension();
                $file->storeAs('uploads', $filename);
                $product->photos()->create([
                    'src' => $filename
                ]);
            }
            $product->update();
        });
    }

    public function addPreviewPhoto(Product $product, $photo)
    {
        DB::transaction(function () use ($photo, $product) {
                $filename = str_random(20) . '.' . $photo->extension();
                $photo->storeAs('uploads/preview', $filename);

                $www = PhotoPreview::create(['product_id' => $product->id, 'src' => $filename]);
                $product->setPreviewPhoto($www->id);
        });        
    }
    
    public function getString(Product $product, $entity)
    {
        $entity = $product->$entity()->pluck('title', 'id')->all();
        $string = null;
        
        foreach ($entity as $key => $value) {
           $string =  $string . $value . ', ';
        }
        
        return substr($string, 0, -2);
    }

}   
