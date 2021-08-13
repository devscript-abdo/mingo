<?php

namespace App\Http\Requests\API\Customer;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')
            ->user()->currentAccessToken()  === request()->user()->currentAccessToken();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'oldpassword' => ['nullable', 'string', 'min:6', new MatchOldPassword],
            'new_password' => ['required_with:oldpassword'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
}
