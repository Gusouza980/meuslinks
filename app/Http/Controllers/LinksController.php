<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class LinksController extends Controller
{
    //

    public function consultar(Cliente $cliente){
        return view("painel.links.consultar", ["cliente" => $cliente]);
    }

}
