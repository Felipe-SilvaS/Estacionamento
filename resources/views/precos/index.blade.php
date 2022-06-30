@extends('layouts.base')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 id="h1Titulo" class="my-4">Tabela de preços @yield('content-header')</h1>
            <div>
                @yield('content')
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <p> {{ $error }}</p>
                @endforeach
                @endif
                <div>
                    <table id="tabelaVeiculos" width=50% cellspacing="2" cellpadding="5" border="2">
                        <tr>
                            <th>Veículos até 1 hora</th> <td>R$10,00</td>
                        </tr>
                        <tr>
                            <th>Adicional horas</th> <td>R$5,00</td>
                        </tr>
                        <tr>
                            <th>Mensalista</th> <td>R$160,00</td>
                        </tr>
                        <tr>
                            <th>Moto</th> <td>R$10,00</td>
                        </tr>
                        <tr>
                            <th>Motorhome</th><td>R$10,00</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@stop
