<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisteringRequest extends FormRequest
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


    public function rules()
    {
        return [
            'password' =>[
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'role' =>[
                'required',
                Rule::in([
                    UserRoleEnum::APPLICANT,
                    UserRoleEnum::HR,
                ]),
            ],
        ];
    }
}
