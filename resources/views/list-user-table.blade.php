@extends("template")

@section("title", "Seus pedidos")
@section("sub", "Aqui está listado seus pedidos!")

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
        .cancelado{
            pointer-events: none;
            border-color: gray;
        }
    </style>
@endsection

@section("nav")
    @parent
    <th><a href="{{route("index")}}">Página inicial</a></th>
    </tr>
    <tr>
        <th><a href="{{route("pedido.create")}}">Fazer um Pedido</a></th>
    </tr>

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
            @foreach ($lista as $linha)
                <tr>
                <td>{{ $linha->endereco }}</td>
                <td>{{ $linha->status }}</td>
                <td>{{ $linha->description }}</td>
                <td><a href="{{ asset("storage/{$linha->imagem}") }}">
                        <img style="" src="{{asset("storage/{$linha->imagem}")}}" alt="fodase">
                </a></td>
                    <td>
                        @if(Auth::user()->status != "Cancelado")
                            @php
                                $disable = (($linha->status == "Cancelado") || ($linha->status == "Completo") || ($linha->status == "Enviado"));
                            @endphp
                            <form method="get" action="{{route("user.cancel", $linha->id)}}">
                                <button class="@if($disable) cancelado @endif cancel-button">Cancelar</button>
                            </form>
                            <form method="GET" action="{{ route("user.edit", $linha->id) }}">
                                <input name="id" value="{{ $linha->id }}">
                                <button @if($disable) class="cancelado" @endif>Editar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lista->links("vendor/pagination/tailwind") }}
@endsection
