@extends('layouts.base')

@section('content-header')
    <h1>Registro de Veículo</h1>
@endsection

@section('content')
    <form action="">
        <div>
            <label for="">Nome</label>
            <input type="text">
        </div>

        <div>
            <label for="">CPF</label>
            <input type="text">
        </div>

        <div>
            <label for="">placa</label>
            <input type="text">
        </div>

        <div>
            <label for="">acesso</label>
            <input type="data">
        </div>

        <div>
            <label for="">status pagamento</label>
            <input type="text">
        </div>

        <button></button>

    </form>
@endsection
