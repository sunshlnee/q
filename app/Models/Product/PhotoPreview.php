<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class PhotoPreview extends Model
{
    protected $table = 'product_preview_photos';

    public $timestamps = false;

    protected $fillable = ['src'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImage()
    {
        return "/uploads/preview/" . $this->src;
    }
}
