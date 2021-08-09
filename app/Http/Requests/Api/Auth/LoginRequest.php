<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\IsPhone;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed phone
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => ['required', new IsPhone()]
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'فیلد تلفن همراه الزامی میباشد.'
        ];
    }
}
