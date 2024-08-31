<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());
        // $contato->save();

        // $contato = new SiteContato();
        // $contato->create($request->all());
        // print_r($contato->getAttributes());
        
        $motivo_contatos = MotivoContato::all()->pluck('motivo_contato', 'id')->toArray();
        
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000', 
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido.',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome informado já está em uso.',
            'telefone.required' => 'O campo telefone precisa ser preenchido.',

            'email.email' => 'O email informado não é válido.',
            'mensagem.max' => 'O campo nome precisa ter no máximo 2000 caracteres.',
            'required' => 'O campo :attribute dever ser preenchido.'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
