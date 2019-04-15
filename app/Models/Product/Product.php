<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    public const IS_RECOMMENDED = 1;
    public const IS_STANDART = 0;
    public $fillable = ['code', 'price', 'brand_id', 'category_id'];

    public static function add(Request $request)
    {
        $product = new static;
        $product->fill($request->all());
        $product->save();
        return $product;
    }

    public function setSizes($ids)
    {
        if($ids == null) {return;}
        $this->sizes()->sync($ids);
    }

    public function setFabrics($ids)
    {
        if($ids == null) {return;}
        $this->fabrics()->sync($ids);
    }

    public function setColors($ids)
    {
        if($ids == null) {return;}
        $this->colors()->sync($ids);
    }
    
    public function setSlug()
    {
        if($this->category_id != null) {
            $this->slug = $this->category->slug .'-'. $this->code;
       }
    }
    
    public function setPreviewPhoto($id) 
    {
        $this->photo_preview_id = $id;  
        $this->save();
    }

    public function images()
    {
        $json = "[";
        $photos = $this->photos()->get()->pluck('src')->toArray();
        foreach($photos as $photo) {
            $json = $json . "'/uploads/$photo',";
        }
        return $json . ']';
    }

    public function getPreview()
    {
        return '/uploads/preview/' . $this->preview()->get()->first()->src;
    }

    public function switchRecommended($value)
    {
        if($value == null) {
            return $this->setRecommended();
        }
            
        return $this->setStandart();
    }

    public function setStandart()
    {
        $this->recommended = Product::IS_STANDART;
        $this->save();
    }

    public function setRecommended()
    {
        $this->recommended = Product::IS_RECOMMENDED;
        $this->save();
    }

    public function scopeForCategory(Builder $query, Category $category)
    {
        return $query->whereIn('category_id', array_merge(
            [$category->id],
            $category->descendants()->pluck('id')->toArray()
        ));
    }

    public function isRecommended()
    {
        return $this->recommended === self::IS_RECOMMENDED;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);        
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'size_product');
    }

    public function fabrics()
    {
        return $this->belongsToMany(Fabric::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id');
    }

    public function preview()
    {
        return $this->belongsTo(PhotoPreview::class, 'photo_preview_id');
    }
}
