<?php

namespace App\Http\Requests\Customer;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerInfoRequest extends FormRequest
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
            'email' => ['required', 'email', 'string', Rule::unique('customers')->ignore(auth()->user()->id)],
            'phone' => ['nullable', 'numeric', Rule::unique('customers')->ignore(auth()->user()->id)],
            'city' => 'required|string',
            'addresse' => ['required_with:city','string'],
            'oldpassword' => ['nullable', 'string', 'min:6', new MatchOldPassword],
            'new_password' => ['required_with:oldpassword'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
}
