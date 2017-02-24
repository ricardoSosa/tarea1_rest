<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
        $methodRequest = $this->method();
        if($methodRequest == 'POST' || $methodRequest == 'PUT'){
            return [
                'first_name' => 'required|string',
                'last_name' => 'required|string'
            ];
        } else if($methodRequest == 'PATCH'){
            return [
                'first_name' => 'string',
                'last_name' => 'string'
            ];
        }
    }
}
