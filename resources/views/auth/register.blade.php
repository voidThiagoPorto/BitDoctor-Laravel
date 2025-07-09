@extends('template')

@section("meta")
@parent
<style>
    html{
        height: 100%;
        justify-content: center;
    }
    body{
        border: 2px solid white;
    }
    .porra{
        min-width: 5rem;
    }
</style>
@endsection

@section("title", "Registre-se aqui")
@section("sub", "e usufrua de nossos produtos")

@section("nav")
    @parent
    <tr>
        <td class="porra"><a href="{{ route("login") }}">ou Faça Login</a></td>
    </tr>
@endsection

@section("content")
    @foreach ($errors->all() as $message)
        {{ __($message) }}<br>
    @endforeach
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="grid">
        {{--
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="lastName" :value="__('Sobrenome')" />
                <x-text-input id="name" class="" type="text" name="name" :value="old('name')"
                    required autofocus />

            </div> --}}
        <label for="nome">Nome
            <input style="@if ($errors->has('nome')) border-color:red; @endif" id="nome" type="text" name="nome"></input>
        </label>
        {{-- <x-input-error :messages="$errors->get('name')" class="" /> --}}

        <label for="sobrenome">Sobrenome
            <input style="@if ($errors->has('sobrenome')) border-color:red; @endif" id="sobrenome" type="text" name="sobrenome"></input>
        </label>
        {{-- <x-input-error :messages="$errors->get('last-name')" class="" /> --}}
    </div>

    {{--             <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
    <div>
        <label for="email">E-mail
            <input style="@if ($errors->has('email')) border-color:red; @endif" id="email" type="text" name="email"></input>
        </label>
        {{-- <x-input-error :messages="$errors->get('email')" class="" /> --}}
    </div>

    {{--
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div> --}}

    <div class="grid">
        <label for="senha">Senha
            <input style="@if ($errors->has('senha')) border-color:red; @endif" id="senha" type="password" name="senha"></input>
        </label>
        {{-- <x-input-error :messages="$errors->get('password')" class="" /> --}}
        <label for="senha_confirmation">Confirme a senha
            <input style="@if ($errors->has('senha')) border-color:red; @endif" id="senha_confirmation" type="password" name="senha_confirmation"></input>
        </label>
        {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="" /> --}}
    </div>

    <div>
        <x-primary-button class="">
            Registrar
        </x-primary-button>
    </div>
</form>
@endsection
