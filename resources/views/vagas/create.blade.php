@extends('layouts.base')

@section('content-header')
    <h2 class="fs-2">Registro de Veículo</h2>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('vagas.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label for="">Nome</label>
                        <input type="text" id="nome" class="form-control" name="nome_visitante"
                            value="{{ old('nome_visitante') }}">
                        <div>
                            <strong></strong>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="">CPF</label>
                        <input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Placa </label>
                        <input type="text" name="placa" class="form-control" value="{{ old('placa') }}">
                    </div>

                    <div class="col-md-6 me-1">
                        <label for="">Data de Acesso</label>
                        <input type="datetime-local" name="acesso" class="form-control" value="{{ old('acesso') }}">
                    </div>

                    <div class="col-12">
                        <label for="">Pagamento</label>

                        <div class="form-check">
                            <input type="radio" name="status_pagamento" class="form-check-input" value="1"
                                id="pago" {{ old('status_pagamento') === '1' ? 'checked' : ' ' }}>
                            <label for="pago">Pago</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="status_pagamento" class="form-check-input" value="0"
                                id="pendente" {{ old('status_pagamento') === '0' ? 'checked' : ' ' }}>
                            <label for="pendente" class="form-check-label"></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
