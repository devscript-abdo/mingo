<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->user()->currentAccessToken()->token  === request()->user()->currentAccessToken()->token ;

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
            'email' => ['required', 'email', 'string', Rule::unique('customers')->ignore(request()->user()->currentAccessToken()->tokenable_id)],
            'phone' => ['nullable', 'numeric', Rule::unique('customers')->ignore(request()->user()->currentAccessToken()->tokenable_id)],
            'city' => 'required|string',
            'addresse' => ['required_with:city','string'],
            //'oldpassword' => ['nullable', 'string', 'min:6', new MatchOldPassword],
            //'new_password' => ['required_with:oldpassword'],
           // 'new_confirm_password' => ['same:new_password'],
            //'password' => ['required', 'string', 'min:8'],
        ];
    }
}
