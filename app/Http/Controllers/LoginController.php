<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            return redirect()->intended('/series')
                ->with('mensagem.sucesso', 'Login realizado com sucesso!');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'email' => 'E-mail ou senha inválidos.'
            ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')
            ->with('mensagem.sucesso', 'Logout realizado com sucesso!');
    }
}
