<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAddressRequest extends FormRequest
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
          'address' => 'required|string',
          'city' => 'required|string',
          'province' => 'required|integer|min:0',
          'zip' => 'required|integer|min:1000|max:9999'
        ];
    }

    public function attributes()
    {
      return [
        'address' => 'domicilio',
        'city' => 'ciudad',
        'province' => 'provincia',
        'zip' => 'código postal'
      ];
    }
}
