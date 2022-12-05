<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
        ];
    }

    /**
     * Authorize the user by email and password
     *
     * @return array<string, mixed>
     */
    public function validateByDB(): \Illuminate\Contracts\View\View|array
    {
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return [
                'message' => 'Akun dengan email tersebut tidak ditemukan.'
            ];
        }

        $credentials = $this->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user->session()->regenerate();

            return redirect()->intended('dashboard');
        };

        return back()->withErrors([
            'password' => 'Password yang anda masukkan salah.',
        ])->onlyInput('password');
    }
}
