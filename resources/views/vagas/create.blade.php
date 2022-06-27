@extends('layouts.base')

@section('content-header')
    <h2>Registro de Veículo</h2>
@endsection

@section('content')
    <form action="{{route('vagas.store')}}" method="POST">
        @csrf
        <div>
            <label for="">Nome</label>
            <input type="text" name="nome_visitante">
        </div>

        <div>
            <label for="">CPF</label>
            <input type="text" name="cpf">
        </div>

        <div>
            <label for="">placa</label>
            <input type="text" name="placa">
        </div>

        <div>
            <label for="">acesso</label>
            <input type="datetime-local" name="acesso">
        </div>

        <div>
            <label for="">Pagamento</label>
            <input type="radio" name="status_pagamento" value="0">
            <input type="radio" name="status_pagamento" value="0">
        </div>

        <button type="submit">Adicionar</button>
    </form>
@endsection
