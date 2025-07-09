@extends("template")

@section("title", "Editando Pedido ")
@section("sub", "Consertando seu computador desde 2025!")

@section("meta")
    @parent
    <style>
        img{
            filter: grayscale(100%);
        }
        .wrapper{
            border: 2px solid white;
            display: inline-block;
            padding: 10px;
        }
    </style>
    @endsection

    @section("nav")
        @parent
        </tr>
    <tr></tr>
@endsection

@section("content")
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{ route("update.requests", $pedido["id"]) }}">
        @csrf
        <label for="endereco">Endereço
            <input style="flex-grow: 1" type="text" name="endereco" autocomplete="address" value="{{ $pedido->endereco }}">
        </label>
        <div class="grid">
            <label for="numero">Numero
                <input type="text" name="numero" autocomplete="address_number" value="{{ $pedido->numero }}">
            </label>
            <label for="CEP" >CEP
                <input value="{{ $pedido->cep }}" type="text" name="CEP" autocomplete="cep">
            </label>
            <label for="estado">UF
                <input value="{{ $pedido->estado }}" type="text" name="estado" autocomplete="estado">
            </label>
        </div>
        @php
            $statuses = ["Esperando entrega", "Recebido", "Em andamento", "Enviado", "Completo", "Cancelado"];
        @endphp
        <div class="grid">
            <label for="status">Status
                <select name="status">
                    @foreach(["Esperando entrega", "Recebido", "Em andamento", "Enviado", "Completo", "Cancelado"] as $status)
                        <option value="{{ $status }}" @if($status === $pedido->status ) selected @endif>

                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>
        <div>
            <label for="desc">Descrição
                <textarea name="desc">{{ $pedido->description }}</textarea>
            </label>
        </div>
        <div>
            <label for="imagem">Imagem
                <div style="min-width: 100%" class="wrapper">
                    <figure>
                        <input style="" type="file" name="imagem">
                        <img src="{{asset("storage/".  $pedido->imagem)}}" alt="ueueue">
                    </figure>
                </div>
            </label>
        </div>
        <input type="hidden" value="{{ URL::previous() }}" name="url">
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
