<?php


namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'product_photos';

    public $timestamps = false;

    protected $fillable = ['src'];

    public function getImage()
    {
        return "/uploads/" . $this->src;
    }

}