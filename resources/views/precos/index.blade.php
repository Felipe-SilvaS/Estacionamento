@extends('layouts.base')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">@yield('content-header')</h1>
            <div>
                @yield('content')
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <p> {{ $error }}</p>
                @endforeach
                @endif
                <div>
                    <table border="2">
                        <tr>
                            <th>Frutas</th>
                            <th>Verduras</th>
                            <th>Grãos</th>
                            <th>...</th>

                        </tr>
                        <tr>
                            <td>Maçã</td>
                            <td>Alface</td>
                            <td>Arroz</td>
                            <td rowspan="4"></td>
                        </tr>
                        <tr>
                            <td>Laranja</td>
                            <td>Beterraba</td>
                            <td>Trigo</td>
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

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@stop
