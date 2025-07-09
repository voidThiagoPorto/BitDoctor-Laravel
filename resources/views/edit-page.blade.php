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
    <form method="POST" enctype="multipart/form-data" action="{{ route("user.update", $pedido["id"]) }}">
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
        <div>
            <label for="desc">Descrição
                <textarea name="desc">{{ $pedido->description }}</textarea>
            </label>
        </div>
        <div>
            <label for="imagem">Imagem
                <div style="min-width: 100%" class="wrapper">
                <figure>
                <img src="{{asset("storage/".  $pedido->imagem)}}" alt="ueueue">
                </figure>
                </div>
            </label>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
