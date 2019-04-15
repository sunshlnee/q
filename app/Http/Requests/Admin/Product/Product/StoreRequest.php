<?php

namespace App\Http\Requests\Admin\Product\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:255',
            'price' => 'required|string|max:32767',
            'category_id' => 'required',
        ];
    }
}
