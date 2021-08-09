<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\IsPhone;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed token
 * @property mixed phone
 */
class LoginRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->request->add([
            'phone' => makeEnglishNumber($this->get('phone')),
            'token' => makeEnglishNumber($this->get('token')),
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => ['required', 'exists:users,phone', new IsPhone()],
            'token' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required'    => 'فیلد تلفن همراه الزامی میباشد.',
            'phone.exists'      => 'تلفن همراه در سامانه موجود نمیباشد.',
            'token.required'    => 'رمز یکبار مصرف الزامی میباشد.',
        ];
    }
}
