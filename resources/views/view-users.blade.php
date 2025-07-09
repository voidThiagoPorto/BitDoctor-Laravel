@extends("template")

@section("title", "Lista de usuarios")
@section("sub", "Controle os usuarios aqui!")
@section("nav")
    @parent
</tr>
<tr></tr>
@endsection
@section("meta")
   @parent
   <style>
       .delete-button{
           border-color:red;
       }
   </style>
@endsection
@section("content")
    <table>
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Ação</th>
        </thead>
        <tbody>
    @foreach($lines as $line)
        <tr>
            <th class="">{{$line->nome}}</th>
            <th class="">{{$line->email}}</th>
            <th class="">
                <button onclick="if (confirm('Tem certeza que deseja deletar esse usuario?')) { window.location.href='{{ route("delete.users", $line->id) }}'; }" class="delete-button">Deletar</button>
                <button onclick="window.location.href='{{route("requests-viewId", $line->id)}}';">Pedidos</button>
            </th>
        </tr>
    @endforeach
        </tbody>
    </table>
    {{ $lines->links() }}
@endsection
