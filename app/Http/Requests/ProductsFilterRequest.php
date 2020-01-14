<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProductsFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required_with_all:minPrice,maxPrice,sortBy|integer',
            'minPrice' => 'required_with_all:category,maxPrice,sortBy|integer',
            'maxPrice' => 'required_with_all:minPrice,category,sortBy|integer',
            'sortBy' => [
              'required_with_all:minPrice,maxPrice,category',
              Rule::in(['date', 'name', 'price']),
            ]
        ];
    }
}
