<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller{

    public function usershow(){
        $info = DB::table("pedidos")->where("userId", "=", Auth::id());
        //sORTAR PELA ORDEM SQL FIELD() Field retorna a posiçao do 1 argumento no array de argumentos de [1] a [N]
        $info = $info->orderByRaw("Field(status, \"Completo\", \"Enviado\", \"Em andamento\", \"Recebido\", \"Esperando entrega\", \"Cancelado\")");
        return view("list-user-table", ['lista' => $info->paginate(5)]);
    }
}
