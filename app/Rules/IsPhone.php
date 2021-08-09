<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsPhone implements Rule
{
    public function passes($attribute, $value): bool
    {
        $value = makeEnglishNumber($value);
        if (preg_match('/^(((98)|(\+98)|(0098)|0)(9){1}[0-9]{9})+$/', $value) || preg_match('/^(9){1}[0-9]{9}+$/', $value))
            return true;

        return false;
    }

    public function message(): string
    {
        return 'تلفن همراه را به صورت صحیح وارد نمایید.';
    }
}
