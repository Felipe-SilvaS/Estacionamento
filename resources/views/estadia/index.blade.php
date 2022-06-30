@extends('layouts.base')

@section('content')
@include('layouts.partials.message')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Lista de Visitantes @yield('content-header')</h1>
            <div>
                @yield('content')
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <p> {{ $error }}</p>
                @endforeach
                @endif
                <div>
                    @foreach ($estadia as $estadia)
                    <p>Nome: {{$estadia->veiculo->nome_proprietario}}</p>
                    <p>Acesso: {{date( 'd/m/Y' , strtotime($estadia->data_acesso))}} às {{date( 'H:i:s' , strtotime($estadia->data_acesso   ))}}</p>
                    <p>Status do pagamento: {{$estadia->status_pagamento}}</p>
                    <div>
                        <a href="{{ route('estadia.show', $estadia->id) }}" class="btn btn-dark btn-lg mr-1">Ver detalhes</a>
                        <form action ="{{ route('estadia.destroy', $estadia->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value= "DELETE">
                            <button type="submit" class="btn btn-dark btn-lg mr-1">Liberar a saída</button>
                        </form>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>

@stop
