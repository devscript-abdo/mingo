<?php

namespace App\Http\Requests\API\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
        $emailRule = auth('sanctum')->user() ? ['required', 'email'] : ['required', 'email', Rule::unique('customers', 'email')->ignore(request()->user()->currentAccessToken()->tokenable_id)];

        return [
            'email' =>  $emailRule,
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            //'province'=>'required|string',
            'phone' => 'required|phone:MA',
            'notes' => 'nullable|string'
        ];
    }
}
