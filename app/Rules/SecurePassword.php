<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SecurePassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $forbiddenPasswords = ['12345678', 'qwerty', 'password']; 

        if (in_array(strtolower($value), $forbiddenPasswords)) {
            $fail("Слишком слабый пароль.");
        }
    }
}