@extends('layouts.base')

@section('content')

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
                    @foreach ($vagas as $vaga)
                    <p>Nome: {{$vaga->nome_visitante}}</p>
                    <p>Acesso: {{date( 'd/m/Y' , strtotime($vaga->acesso))}}</p>
                    <p>Status do pagamento: {{$vaga->status_pagamento}}</p>
                    <div>
                        <a href="{{ route('vagas.show', $vaga->id) }}" class="btn btn-dark btn-lg mr-1">Ver detalhes</a>
                        <form action ="{{ route('vagas.destroy', $vaga->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value= "DELETE">
                            <button type="submit" class="btn btn-dark btn-lg mr-1">Pagar</button>
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
