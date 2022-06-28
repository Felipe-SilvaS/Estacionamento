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
        <div class="card-header">
            <span>Quantidade de Vagas: </span>
        </div>
        <div class="card-body">
            <form action="{{ route('vagas.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome do Proprietário</label>
                        <input type="text" id="nome"
                            class="form-control {{ $errors->has('nome_visitante') ? 'is-invalid' : '' }}"
                            name="nome_visitante" value="{{ old('nome_visitante') }}"
                            aria-describedby="nomeValidationFeedback">
                        <div id="nomeValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('nome_visitante') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf"
                            class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" name="cpf"
                            value="{{ old('cpf') }}" aria-describedby="cpfValiditonFeedback">
                        <div id="cpfValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('cpf') }}</span>
                        </div>
                    </div>

                    <div class="col-6 me-1">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" id="telefone"
                            class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" name="telefone"
                            value="{{ old('telefone') }}" aria-describedby="telefoneValidationFeedback">
                        <div id="telefoneValidationFeedback" class="invalid-feedback">
                            <span> {{ $errors->first('telefone') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="placa" class="form-label">Placa </label>
                        <input type="text" id="placa"
                            class="form-control {{ $errors->has('placa') ? 'is-invalid' : '' }}" name="placa"
                            value="{{ old('placa') }}" aria-describedby="placaValidationFeedback">
                        <div id="placaValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('placa') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="acesso" class="form-label">Entrada</label>
                        <input type="datetime-local" id="acesso" class="form-control" value="{{ old('acesso') }}"
                            name="acesso">
                        <div>

                        </div>
                    </div>

                    <div class="col-12">
                        <span class="d-block form-label">Pagamento</span>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="pago" class="form-check-input" name="status_pagamento"
                                value="1" {{ old('status_pagamento') === '1' ? 'checked' : ' ' }}>
                            <label for="pago">Pago</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="pendente" class="form-check-input" name="status_pagamento"
                                value="0" {{ old('status_pagamento') === '0' ? 'checked' : ' ' }}>
                            <label for="pendente" class="form-check-label">Pendente</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
