<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'nik' => 'required|unique:masyarakat,nik',
                'nama' => 'required|max:20',
                'username' => 'required|max:20',
                'password' => 'required|max:20',
                'telp' => 'required|max:13'
                
        ];
    }

    public function messages()
    {
        return [
            'nik.unique' => 'NIK Sudah Terpakai',
            'email.unique' => 'Email Sudah Terpakai',
        ];
    }
}
