@extends("template")

@section("title", "Lista de pedidos")
@section("sub", "Listando pedidos de $subject")
@section("meta")
    @parent
    <style>
        img{
            max-height: 200px;
            filter: grayscale(100%)
        }
        img:hover{
            filter:none;
        }
        .cancel-button{
            border-color: red;
        }
        button{
            margin: 3px;
        }
        input{
            display: none;
        }
        form{
            margin: 0;
        }
        .desabilitado{
            pointer-events: none;
            border-color: gray;
        }
    </style>

    @endsection
@section("nav")
    @parent
    </tr>
<tr></tr>
@endsection
@section("content")
    <table>
        <thead>
        <tr>
            <th>Endereço</th>
            <th>Status</th>
            <th>Descriçao do problema</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($linhas as $linha)
            <tr>
                <td>{{ $linha->endereco }}</td>
                <td>{{ $linha->status }}</td>
                <td>{{ $linha->description }}</td>
                <td>
                    <a href="{{ asset("storage/{$linha->imagem}") }}">
                        <img style="" src="{{asset("storage/{$linha->imagem}")}}" alt="fodase">
                    </a>
                </td>
                <td>
                    <form method="get" action="{{route("delete.requests", $linha->id)}}">
                        <button class="cancel-button">Apagar</button>
                    </form>
                    <form method="GET" action="{{ route("edit.requests", $linha->id) }}">
                        <button>Editar</button>
                    </form>
                    <form method="GET" action="{{route("nextStatus.requests", [$linha->id, $pageId ?? null])}}">
                        <button @if($linha->status == "Completo" || $linha->status == "Cancelado") class="desabilitado" @endif>Status></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $linhas->links() }}
@endsection
