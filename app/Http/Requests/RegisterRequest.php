<?php

namespace App\Http\Requests;

use App\Entities\UserEntity;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }

    public function getEntity(): UserEntity
    {
        return new UserEntity(
            $this->get('name'),
            $this->get('email'),
            $this->get('password')
        );
    }
}
