<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Mostra página de autenticação de usuário
     *
     * @return view
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Mostra página de registro de usuário
     *
     * @return view
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Executa a autenticação do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function signin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        
        return back()->withError('Usuário ou senha incorretos');
    }

    /**
     * Executa o registro do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function signup(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Executa o logout do usuário
     *
     * @param Request $request
     *
     * @return redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
