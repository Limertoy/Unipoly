<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'unique:users|max:32',
            'email' => 'unique:users|max:254',
            'avatar' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'To imię już zajęte, spróbuj inne!',
            'name.max' => 'Dlugość imienia nie powinna przekraczać 32 znaków!',
            'email.unique' => 'Ten :attribute już zajęty, spróbuj inny!',
            'email.max' => 'Dlugość emailu nie powinna przekraczać 255 znaków!',
            'avatar.image' => 'Przyjmowane są formaty .png, .jpg oraz .jpeg!'
        ];
    }
}
