<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'is_student' => 'bool|required',
            'nis' => 'required_if:is_student,1|numeric',
            'nisn' => 'required_if:is_student,1|numeric',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return void
     */
    public function createUser(): void
    {
        $user = new User();
        $user->fill($this->validated());
        $user->password = bcrypt($this->password);
        $user->save();

        $user->is_student == true ? $user->assignRole('student') : $user->assignRole('staff');
    }
}
