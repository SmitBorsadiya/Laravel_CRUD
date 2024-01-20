<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class ProductRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "name"=> "required|string",
            "salt_composition"=> "required|string",
            "packsize"=> "required|string",
            "price"=> "required|numeric",
            "slug"=> "required|string",
            // "images"=> "required|array"
        ];
    }
}
