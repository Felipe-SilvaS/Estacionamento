@extends('layouts.base')

@section('content-header')
    <h2>Registro de Veículo</h2>
@endsection

@section('content')
    @include('layouts.partials.message')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vagas.store') }}" method="POST">
        @csrf
        <div>
            <label for="">Nome</label>
            <input type="text" name="nome_visitante" value="{{ old('nome_visitante') }}">
            <div>
                <strong></strong>
            </div>
        </div>

        <div>
            <label for="">CPF</label>
            <input type="text" name="cpf" value="{{ old('cpf') }}">
        </div>

        <div>
            <label for="">placa</label>
            <input type="text" name="placa" value="{{ old('placa') }}">
        </div>

        <div>
            <label for="">acesso</label>
            <input type="datetime-local" name="acesso" value="{{ old('acesso') }}">
        </div>

        <div>
            <label for="">Pagamento</label>
            <input type="radio" name="status_pagamento" value="1" id="pago">
            <label for="pago">Pago</label>
            <input type="radio" name="status_pagamento" value="0" id="pendente">
            <label for="pendente">Pendente</label>
        </div>

        <button type="submit">Adicionar</button>
    </form>
@endsection
