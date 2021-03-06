<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Lead;

class PainelController extends Controller
{
    //
    public function index(){
        return view("painel.index");
    }

    public function login(){
        if(session()->get("usuario")){
            return redirect()->route("painel.index");
        }
        return view("painel.login");
    }

    public function logar(Request $request){
        $usuario = Usuario::where("usuario", $request->usuario)->first();
        
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                session()->put(["usuario" => $usuario->toArray()]);
                Log::channel('acessos')->info('<b>LOGIN</b>: O usuario <b>' . $usuario->usuario . '</b> logou no sistema.');
                return redirect()->route("painel.index");
            }else{
                toastr()->error("Informações de usuário incorretas!");
            }
        }else{
            toastr()->error("Informações de usuário incorretas!");
        }

        return redirect()->back();
    }

    public function dados(){
        return view("painel.dados");
    }

    public function sair(){
        Log::channel('acessos')->info('<b>SAIDA</b>: O usuario <b>' . session()->get("usuario")["usuario"] . '</b> saiu do sistema.');
        session()->forget("usuario");
        return redirect()->route("painel.login");
    }

    public function leads(){
        $leads = Lead::all();
        return view("painel.leads.consultar", ["leads" => $leads]);
    }
}
