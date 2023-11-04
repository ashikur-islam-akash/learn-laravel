<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsereRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'name'      => 'required|string',
            'email'     => ['required', Rule::unique('users')->ignore($id)],
            'phone'    => ['required','regex:/(01)[0-9]{9}/', Rule::unique('users')->ignore($id)],
            'role'     => 'required',
        ];
    }
}
