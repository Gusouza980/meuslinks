<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Visitante;
use App\Models\Acesso;
use App\Models\Click;

class SiteController extends Controller
{
    //
    public function index($slug){
        if($slug == 'sistema'){
            return redirect()->route("painel.index");
        }
        $cliente = Cliente::where([["slug", $slug], ["ativo", true]])->first();
        if($cliente){
            $ip = null;

            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        
            $estado = null;
            $cidade = null;
            $cep = null;

            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        
            if($query && $query["status"] == "success"){
                $estado = $query["region"];
                $cidade = $query["city"];
                $cep = $query["zip"];
            }

            $visitante = Visitante::where("ip", $ip)->first();
            if(!$visitante){
                $visitante = new Visitante;
                $visitante->ip = $ip;
                $visitante->ip_uf = $estado;
                $visitante->ip_cep = $cep;
                $visitante->save();
            }

            $acesso = new Acesso;
            $acesso->visitante_id = $visitante->id;
            $acesso->cliente_id = $cliente->id;
            $acesso->save();

            return view("index", ["cliente" => $cliente, "visitante" => $visitante, "acesso" => $acesso]);
        }
        
    }

    public function click(Request $request){
        $click = new Click;
        $click->visitante_id = $request->visitante;
        $click->acesso_id = $request->acesso;
        if($request->is_elemento == "true"){
            $click->elemento = true;
            $click->rede = false;
            $click->elemento_id = $request->elemento;
        }else{
            $click->rede = true;
            $click->elemento = false;
            $click->tipo_rede = $request->tipo_rede;
        }
        $click->save();
        return response()->json("sucesso");
    }
}
