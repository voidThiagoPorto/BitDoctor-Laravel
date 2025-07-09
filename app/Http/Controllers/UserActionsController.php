<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Storage;

class UserActionsController extends Controller
{
    public function create(string $id){
        $pedido = Pedidos::find($id);
        if(!auth()->user()->id === $pedido->userId){
            abort(403);
        }
        return view("edit-page", [
            "pedido" => $pedido
        ]);
    }
    public function store(Request $request, string $id)
    {
        $dados = $request->except('_token', 'submit');
        $request->validate([
            "endereco" => ['required', 'string', 'max:240'],
            "numero" => ['required', 'string', 'max:5'],
            "CEP" => ['required', 'string', 'max:9'],
            "estado" => ['required', 'string', 'max:2'],
            "desc" => ['required', 'string', 'max:1024'],
            "imagem" => ['image', 'file', 'mimes:jpg,jpeg,png,webp']
        ]);
        $pedido = Pedidos::find($id);
        if(($pedido->status == "Cancelado") || ($pedido->status == "Completo") || ($pedido->status == "Enviado")){
                abort(403);
        }
        if ($request->hasFile('imagem')){
            if($pedido->getAttributes()['imagem'] !=NULL)
                Storage::disk('public')->delete($pedido->getAttributes()['imagem']);
            $novoNome = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $novoNome;
        }
        else
            unset($dados["imagem"]);
        $pedido->update($dados);
        return redirect()->route('list.user', $id);
    }
    public function cancel(string $id)
    {
        $pedido = Pedidos::find($id);
        if(($pedido->status == "Cancelado") || ($pedido->status == "Completo") || ($pedido->status == "Enviado")){
            abort(403);
        }
        if(!auth()->user()->id === $pedido->userId){
            abort(403);
        }
        if($pedido->status == "Cancelado"){
            abort(403);
        }
        $pedido->status = "Cancelado";
        $pedido->save();
        return redirect(route("list.user"));
    }
}
