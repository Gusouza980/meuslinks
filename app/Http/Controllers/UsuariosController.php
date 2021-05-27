<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    //
    public function consultar(){
        $usuarios = Usuario::all();
        return view("painel.usuarios.consultar", ["usuarios" => $usuarios]);
    }

    public function cadastro(){
        return view("painel.usuarios.cadastro");
    }

    public function cadastrar(Request $request){
        $request->validate([
            'email' => 'unique:usuarios,email',
            'usuario' => 'unique:usuarios,usuario',
        ]);

        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->senha = Hash::make($request->senha);
        $usuario->save();

        toastr()->success("Cadastro realizado com sucesso!");
        return redirect()->back();
    }

    public function editar(Usuario $usuario){
        return view("painel.usuarios.edicao", ["usuario" => $usuario]);
    }

    public function salvar(Request $request, Usuario $usuario){
        $request->validate([
            'email' => 'unique:usuarios,email,'.$usuario->id,
            'usuario' => 'unique:usuarios,usuario,'.$usuario->id,
        ]);

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        if($request->senha){
            $usuario->senha = Hash::make($request->senha);
        }
        $usuario->save();

        toastr()->success("Cadastro atualizdo com sucesso!");
        return redirect()->route('painel.usuarios');
    }

}
