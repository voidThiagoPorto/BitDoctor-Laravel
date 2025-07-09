<?php

namespace App\Http\Controllers;
use App\Models\Pedidos;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminActionsController extends Controller
{
    public function viewUsers(){
        $pages = User::where("isAdmin", "0")->paginate(12);
        return view("view-users", [
            "lines" => $pages,
        ]);
    }
    public function deleteUsers(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route("admin.users"));
    }
    public function viewRequests(string $id)
    {
        $linhas = Pedidos::where("userId", $id)->paginate(4);
        $usuario = User::find($id);
        return view("admin-requests", [
            "pageId" => $id,
            "subject" => $usuario->nome,
            "linhas" => $linhas,
        ]);
    }
    public function viewAllRequests()
    {
        $linhas = Pedidos::paginate(4);
        return view("admin-requests", [
            "subject" => "todos",
            "linhas" => $linhas,
        ]);
    }
    public function deleteRequests(string $id)
    {
        $pedido = Pedidos::find($id);
        if($pedido->getAttributes()['imagem'] !=NULL)
            Storage::disk('public')->delete($pedido->getAttributes()['imagem']);
        $pedido->delete();
        return redirect(route("requests-viewId", $id));
    }
    public function editRequests(string $id)
    {
        $pedido = Pedidos::find($id);
        return view("admin-edit", [
            'pedido' => $pedido,
        ]);
    }
    public function updateRequests(Request $request, string $id)
    {
        $data = $request->except('_token', 'submit');
        $pedidos = Pedidos::find($id);
        $request->validate([
            "endereco" => ['required', 'string', 'max:240'],
            "numero" => ['required', 'string', 'max:5'],
            "CEP" => ['required', 'string', 'max:9'],
            "estado" => ['required', 'string', 'max:2'],
            "desc" => ['required', 'string', 'max:1024'],
            "status" => ['required', 'string', Rule::in(["Esperando entrega", "Recebido", "Em andamento", "Enviado", "Completo", "Cancelado"])],
            "imagem" => ['image', 'file', 'mimes:jpg,jpeg,png,webp'],
        ]);
        if ($request->hasFile('imagem')){
            if($pedidos->getAttributes()['imagem'] !=NULL)
                Storage::disk('public')->delete($pedidos->getAttributes()['imagem']);
            $novoNome = $request->file('imagem')->store('imagens', 'public');
            $data['imagem'] = $novoNome;
        }
        else
            unset($data['imagem']);
        $pedidos->update($data);
            return redirect(url($request->url));
    }
    public function nextStatusRequests(string $id, ?string $pageId = null){
        $pedido = Pedidos::find($id);
        $current = $pedido->status;
        if($current == "Cancelado" || $current == "Completo")
            abort(403);
        $list = ["Esperando entrega", "Recebido", "Em andamento", "Enviado", "Completo", "Cancelado"];
        $next = array_search($current, $list);
        $pedido->status = $list[$next+1];
        $pedido->save();
        if($pageId){
            return redirect(route("requests-viewId", $pageId));
        }
        else{
            return redirect(route("requests-view"));
        }
    }

}
