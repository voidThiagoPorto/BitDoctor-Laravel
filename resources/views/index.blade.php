@extends("template")

@section("title", "BitDoctor")
@section("sub", "Consertando seu computador desde 2025!")

@section("nav")
    @parent
    @if(!Auth::check())
        <th><a href="{{ route("login") }}">Logar</a></th>
        </tr>
        <tr>
            <th><a href="{{ route("register") }}">Registrar</a></th>
        </tr>
    @elseif(auth()->user()->isAdmin)
        <th><a href={{ route("admin.users") }}>Usuarios</a></th>
        </tr>
        <tr>
            <th><a href='{{route("requests-view")}}'>Pedidos</a></th>
        </tr>
        <tr>
            <th class="width-min">Modo ADM</th>
            <th>Bem-vindo {{auth()->user()->nome}}</th>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <th><a href="javascript:{}" onclick="document.getElementById('logout-form').submit();">Logout</a></th>
            </form>
        </tr>
    @else
        <th><a href="{{ route("pedido.create") }}">Solicitar conserto</a></th>
        <tr>
            <th><a href="{{route("list.user")}}">Ver Pedidos</a></th>
        </tr>
        <tr>
            <th style="border-right: none">
                Bem-Vindo {{auth()->user()->nome}}
            </th>
            <th style="border-left: none"></th>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <th><a href="javascript:{}" onclick="document.getElementById('logout-form').submit();">Logout</a></th>
            </form>
        </tr>
    @endif
@endsection


@section("content")
    <h2>Nossos Serviços</h2>
    <p>Na nossa loja, oferecemos soluções completas para computadores e notebooks, com atendimento rápido, transparente
        e especializado. Trabalhamos com equipamentos de todas as marcas e modelos, garantindo o melhor desempenho para
        seus dispositivos.</p>
    <ul>
        <li>Formatação e Remoção de Vírus</li>
        <ul>
            Reinstalamos o sistema operacional para deixar seu computador mais rápido e estável, além de eliminar vírus,
            malwares e outros arquivos maliciosos que comprometem o desempenho e a segurança.
        </ul>
        <br>
        <li>Upgrade de Peças e Troca</li>
        <ul>
            Substituímos ou melhoramos componentes como HD, SSD, memória RAM, placa-mãe e outros, aumentando a
            performance do computador de forma eficiente e econômica.
        </ul>
        <br>
        <li>Reparo e Diagnostico</li>
        <ul>
            Identificamos e solucionamos problemas físicos ou técnicos, como falhas na inicialização, travamentos,
            superaquecimento ou defeitos em peças internas.
        </ul>
        <br>
        <li>Limpeza e Manutenção Preventiva</li>
        <ul>
            Realizamos limpeza interna completa e revisão geral para evitar o acúmulo de poeira, melhorar a ventilação e
            prevenir danos futuros causados pelo uso contínuo.
        </ul>
        <br>
        <li>Instalação de Software</li>
        <ul>
            Instalamos sistemas operacionais, pacotes de programas, drivers e aplicativos essenciais, configurando tudo
            para que o computador esteja pronto para uso.
        </ul>
        <br>
    </ul>
@endsection
