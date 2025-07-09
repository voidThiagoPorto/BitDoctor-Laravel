@extends('template')

@section("meta")
    @parent
    <style>
        html {
            height: 100%;
            justify-content: center;
        }

        body {
            border: 2px solid white;
        }

        .porra {
            min-width: 5rem;
        }
    </style>
@endsection
@section("title", "Faça login")
@section("sub", "e Tenha acesso aos serviços que você já usufrui")

@section("nav")
    @parent
    <tr>
        <td class="porra"><a href="{{ route('register') }}"> Crie uma conta </a></td>
    </tr>
@endsection

@section("content")
        {{-- Error dump  --}}
        @foreach ($errors->all() as $message)
            {{ __($message) }}<br>
        @endforeach

        {{-- Form Start --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <!-- Email Address -->
        <label for="email">E-mail
            <input style="@if ($errors->has('email')) border-color:red; @endif" id="email" type="text" name="email"
                   autofocus autocomplete="username">
        </label>

        <!-- Password -->
        <label for="senha">Senha
            <input style="@if ($errors->has('senha')) border-color:red; @endif" id="senha" type="password" name="senha"
                   required autocomplete="current-password">
        </label>

        <!-- Remember Me -->
        <div>
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>
        {{-- Send Request --}}
        <div>
            <x-primary-button> Login </x-primary-button>
        </div>
    </form>
@endsection
