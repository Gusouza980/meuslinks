<?php

namespace App\Classes;

use App\Models\Usuario;
use App\Models\Demanda;

class Notificacao{

    public static $tipos = [
        0 => "Cadastro de Demanda",
        1 => "Conclusão de Demanda",
        2 => "Exclusão de Demanda",
        3 => "Reinício de Demanda"
    ];

    public static $mensagens = [
        0 => "O usuario <b>[USUARIO]</b> cadastrou a demanda <b>[DEMANDA]</b> em <b>[AREA]</b> pro dia <b>[DIA]</b>",
        1 => "O usuário <b>[USUARIO]</b> concluiu a demanda <b>[DEMANDA]</b> em <b>[AREA]</b> do dia <b>[DIA]</b>",
        2 => "O usuário <b>[USUARIO]</b> excluiu a demanda <b>[DEMANDA]</b> em <b>[AREA]</b> do dia <b>[DIA]</b>",
        3 => "O usuário <b>[USUARIO]</b> reiniciou a demanda <b>[DEMANDA]</b> em <b>[AREA]</b> do dia <b>[DIA]</b>",
    ];

    public static function getNotificacao(Usuario $usuario, Demanda $demanda, $tipo){
        $mensagem = self::$mensagens[$tipo];
        $mensagem = str_replace("[USUARIO]", $usuario->nome, $mensagem);
        $mensagem = str_replace("[DEMANDA]", $demanda->titulo, $mensagem);
        if($demanda->tipo === 0){
            $mensagem = str_replace("[AREA]", "Artes", $mensagem);
        }else{
            $mensagem = str_replace("[AREA]", "Postagens", $mensagem);
        }
        $mensagem = str_replace("[DIA]", date("d/m/Y", strtotime($demanda->data)), $mensagem);
        return $mensagem;
    }

    public static function getNomeTipo($tipo){
        return self::$tipos[$tipo];
    }

}

?>