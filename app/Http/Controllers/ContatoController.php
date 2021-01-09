<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class ContatoController extends Controller{

    public function contato(){
        return view('site.contato')
            ->with('motivo_contatos', $motivo_contatos = MotivoContato::all());
    }

    public function saveContato(Request $request){
        $request->validate([
            'nome'=>'required|min:3|max:40|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contato'=>'required',
            'mensagem'=>'required:max:2000'
        ],
        [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
            'nome.unique' => 'O nome informado já esta em uso',

            'email.email' => 'O email não é valido',

            'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ]
        );
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();
        // print_r($contato->getAttributes());
        return view('site.contato');
    }
}
