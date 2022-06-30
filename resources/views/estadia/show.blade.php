@extends('layouts.base')

@section('content-header')
    <h2>Detalhes de Estadia</h2>
@endsection

@section('content')
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
@endsection
