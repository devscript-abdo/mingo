<?php

namespace App\Http\Requests\API\Review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
            'rating' => 'required|integer',
            'productId' => 'required|integer',
            'customer_id' => 'nullable|integer',
        ];
    }
}
