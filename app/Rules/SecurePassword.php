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
        // Список запрещенных паролей
        $forbiddenPasswords = ['12345678', 'qwerty', 'password']; // Добавьте сюда другие запрещенные пароли

        // Проверяем, не является ли пароль одним из запрещенных
        if (in_array(strtolower($value), $forbiddenPasswords)) {
            $fail("Слишком слабый пароль.");
        }
    }
}