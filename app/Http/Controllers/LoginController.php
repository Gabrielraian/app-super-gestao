<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1) {
            $erro = 'Usuario e ou senha não existe!';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página!';
        }

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email <br> Senha: $password";

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if (isset($usuario->name)) {
            session(['nome' => $usuario->name]);
            session(['email' => $usuario->email]);
        
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
    }

    public function sair()
    {
        session()->flush();
        return redirect()->route('site.index');
    }
}
