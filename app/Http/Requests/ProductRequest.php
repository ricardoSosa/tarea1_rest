<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $methodRequest = $this->method();
        switch($methodRequest){

            case 'POST':
                return [
                    'name' => 'required|string',
                    'price' => 'required|float|min:1',
                    'description' => 'required|string',
                    'tags' => 'required|array|string',
                    'seller' => 'required'
                ];
                break;

            case 'PUT':
                return [
                    'name' => 'required|string',
                    'price' => 'required|float',
                    'description' => 'required|string',
                ];
                break;

            case 'PATCH':
                return [
                    'name' => 'string',
                    'price' => 'float',
                    'description' => 'string',
                ];
                break;
        }   
    }
}
