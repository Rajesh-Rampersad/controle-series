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
        // Lógica de autenticação do usuário
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redirecionar para a página inicial
            return redirect()->intended('/series');
        }

        // Falha na autenticação, redirecionar de volta com erro
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['email' => 'Credenciais inválidas.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('mensagem.sucesso', 'Usuário deslogado com sucesso.');
    }
}
