<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    /**

     * Determine if the validation rule passes.

     *

     * @param  string  $attribute

     * @param  mixed  $value

     * @return bool

     */

    public function passes($attribute, $value)
    {
        if (request()->routeIs('api.account.update-pass.ar', 'api.account.update-pass.fr')) {
            return Hash::check($value, auth('sanctum')->user()->password);
        } else {
            return Hash::check($value, auth()->guard('customer')->user()->password);
        }
    }

    /**

     * Get the validation error message.

     *

     * @return string

     */

    public function message()
    {
        return 'The :attribute is not match with your current password.';
    }
}
