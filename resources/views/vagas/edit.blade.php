@extends('layouts.base')

@section('content-header')
    <h2>Pagamento do Estacionamento</h2>
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

    <form action="{{ route('vagas.update', $vagas->id) }}" method="POST">
        @method('put')
        @csrf
        <div>
            <label for="">Nome: </label>
            <p>{{$vagas->nome_visitante}}</p>
            <div>
                <strong></strong>
            </div>
        </div>

        <div>
            <label for="">CPF: </label>
            <p>{{$vagas->cpf}}</p>
        </div>

        <div>
            <label for="">Placa: </label>
            <p>{{$vagas->placa}}</p>
        </div>

        <div>
            <label for="">Acesso: </label>
            <p>{{$vagas->acesso}}</p>
        </div>


        <div>
            <label for="">Pagamento</label>
            <input type="radio" name="status_pagamento" value="1" id="pago">
            <label for="pago">Pagar</label>
        </div>

        <button type="submit">Enviar</button>
    </form>
@endsection
