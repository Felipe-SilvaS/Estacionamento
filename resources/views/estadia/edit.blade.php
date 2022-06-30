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

    <form action="{{ route('estadia.update', $estadia->id) }}" method="POST">
        @method('put')
        @csrf
        <div>
            <label for="">Nome: </label>
            <p>{{$estadia->veiculo->nome_proprietario}}</p>
            <div>
                <strong></strong>
            </div>
        </div>

        <div>
            <label for="">CPF: </label>
            <p>{{$estadia->veiculo->cpf}}</p>
        </div>

        <div>
            <label for="">Placa: </label>
            <p>{{$estadia->veiculo->placa}}</p>
        </div>

        <div>
            <label for="">Acesso: </label>
            <p>{{date( 'd/m/Y' , strtotime($estadia->veiculo->data_acesso))}} às {{date( 'H:i:s' , strtotime($estadia->data_acesso))}}</p>
        </div>


        <div>
            <label for="">Pagamento</label>
            <input type="radio" name="status_pagamento" value="1" id="pago">
            <label for="pago">Pagar</label>
        </div>

        <button type="submit">Enviar</button>
    </form>
@endsection
