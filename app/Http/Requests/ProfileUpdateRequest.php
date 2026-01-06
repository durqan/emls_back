<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user()->id)
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно',
            'email.required' => 'Email обязателен',
            'email.unique' => 'Этот email уже занят',
            'avatar.image' => 'Загрузите изображение',
            'avatar.max' => 'Размер изображения не более 2MB',
        ];
    }
}
