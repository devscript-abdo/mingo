<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class WishlistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return
            auth('sanctum')->user()->currentAccessToken()->token
            ===
            request()->user()->currentAccessToken()->token;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productId' => 'required|integer',
        ];
    }
}
