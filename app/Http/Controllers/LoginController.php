<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller{

    public function index(Request $req){
        $erro = $req->get('erro');
        return view('site.login', ['titulo'=>'Login', 'erro'=>$erro]);
    }

    public function autenticar(Request $req){

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo é obrigatorio o zé',
            'senha.required' => 'Bota uma senha nessa merda ai zé'
        ];

        $req->validate($regras, $feedback);

        $email = $req->get('usuario') ;
        $pass  = $req->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
                ->where('password', $pass)
                ->get()
                ->first();
        if(isset($usuario->name)){
            echo 'existe';
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
        echo '<pre>';
        print_r($usuario);
        echo '</pre>';
    }
}
