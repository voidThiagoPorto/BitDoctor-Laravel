@extends("template")

@section("title", "Solicitando conserto")
@section("sub", "Envie seu computador para nos repararmos!")


@section("nav")
    @parent
    </tr>
<tr>
</tr>
<tr>
    <th>Bem-Vindo {{auth()->user()->nome}} </th>
    <th><a href="{{ route("index") }}">Ir Para a Página inicial</a></th>
</tr>
@endsection

@section("content")
    @foreach ($errors->all() as $message)
        {{ __($message) }}<br>
    @endforeach

    <form method="post" enctype="multipart/form-data" action="{{ route("pedido.store") }}">
        @csrf
        <label for="endereco">Endereço
            <input style="flex-grow: 1" type="text" name="endereco" autocomplete="address">
        </label>
        <div class="grid">
            <label for="numero">Numero
                <input type="text" name="numero" autocomplete="address_number">
            </label>
            <label for="CEP">CEP
                <input type="text" name="CEP" autocomplete="cep">
            </label>
            <label for="estado">UF
                <input type="text" name="estado" autocomplete="estado">
            </label>
        </div>
        <div>
            <label for="desc">Descrição
                <textarea name="desc"></textarea>
            </label>
        </div>
        <div>
            <label for="imagem">Imagem
                <input style="" type="file" name="imagem">
            </label>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
