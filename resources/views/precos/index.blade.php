@extends('layouts.base')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Tabela de preços @yield('content-header')</h1>
            <div>
                @yield('content')
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <p> {{ $error }}</p>
                @endforeach
                @endif
                <div>
                    <table width="80%" cellspacing="5" cellpadding="2" border="2">
                        <tr>
                            <th>Permanência</th> <th>Carro</th> <th>Moto</th> <th>Motorhome</th>
                        </tr>
                        <tr>
                            <td>R$100,00</td> <td>R$100,00</td> <td>R$100,00</td> <td rowspan="4"></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@stop
