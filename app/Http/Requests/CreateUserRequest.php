<?php

namespace App\Http\Requests;

class CreateUserRequest extends RegisterUserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->hasRole('admin')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $result = parent::rules();
        $result['role'] = 'required|in:user,editor,admin';
        return $result;
    }
}
