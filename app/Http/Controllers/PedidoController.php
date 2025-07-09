<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(){
        return view("issue-repair");
    }
    public function store(Request $request){
        $request->validate([
            "endereco" => ['required', 'string', 'max:240'],
            "numero" => ['required', 'string', 'max:5'],
            "CEP" => ['required', 'string', 'max:9'],
            "estado" => ['required', 'string', 'max:2'],
            "desc" => ['required', 'string', 'max:1024'],
            "imagem" => ['required', 'image', 'file', 'mimes:jpg,jpeg,png,webp']
        ]);

        $novoNome = $request->file('imagem')->store('imagens', 'public');

        Pedidos::create([
            "userId" => auth()->user()->id,
            "endereco" => $request->endereco,
            "numero" => $request->numero,
            "cep" => $request->CEP,
            "estado" => $request->estado,
            "description" => $request->desc,
            "status" => "Esperando entrega",
            "imagem" => $novoNome,
        ]);

        return redirect(route("index"));
    }
}
