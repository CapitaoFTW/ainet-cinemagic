<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientePost extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' =>                   'required|unique:users,id,'.$this->id.',id',
            'name' =>                   'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->id),
            ],
            'password' =>               'sometimes|min:8|confirmed',//|different:old_password',
            'password_confirmation' =>  'required|same:password',
            'remember_token' =>         'nullable|string|max:100',
            'tipo' =>                   'required|in:C,F,A',
            'bloqueado' =>              'required|digits:1',
            'foto_url' =>               'nullable|url'
        ];
    }
}
