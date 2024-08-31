<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // // return $next($request);
        // echo $metodo_autenticacao. ' - ' . $perfil . '<br>';
        // if($metodo_autenticacao == 'padrao') {
        //     echo 'verificar o usuário e senha no banco de dados'. $perfil . '<br>';
        // }

        // if($metodo_autenticacao == 'ldap') {
        //     echo 'verificar o usuário e senha no AD' . $perfil . '<br>';
        // }

        // if($perfil == 'visitante')
        // {
        //     echo 'Exibir apenas algunas recursos';
        // } else {
        //     echo 'Carregar o perfil do banco de dados';
        // }

        // if(false)
        // {
        //     return $next($request);
        // } else {
        //     return Response('Acesso negado! Rota exige autenticação!');
        // }
        
        session();

        if (session()->has('email') && session('email') != '') {
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
