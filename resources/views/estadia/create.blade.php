@extends('layouts.base')

@section('content-header')
    <h2 class="fs-2">Registro de Veículo</h2>
@endsection

@section('content')
    @include('layouts.partials.message')

    <div class="card">
        <div class="card-header">
            <span>Quantidade de Vagas: </span>
        </div>
        <div class="card-body">
            <form action="{{ route('estadia.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome do Proprietário</label>
                        <input type="text" id="nome"
                            class="form-control {{ $errors->has('nome_proprietario') ? 'is-invalid' : '' }}"
                            name="veiculo[nome_proprietario]" value="{{ old('nome_proprietario') }}"
                            aria-describedby="nomeValidationFeedback">
                        <div id="nomeValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('nome_proprietario') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf"
                            class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" name="veiculo[cpf]"
                            value="{{ old('cpf') }}" aria-describedby="cpfValiditonFeedback">
                        <div id="cpfValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('cpf') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" id="celular"
                            class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" name="veiculo[celular]"
                            value="{{ old('celular') }}" aria-describedby="celularValidationFeedback">
                        <div id="celulareValidationFeedback" class="invalid-feedback">
                            <span> {{ $errors->first('celular') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" id="telefone"
                            class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" name="veiculo[telefone]"
                            value="{{ old('telefone') }}" aria-describedby="telefoneValidationFeedback">
                        <div id="telefoneValidationFeedback" class="invalid-feedback">
                            <span> {{ $errors->first('telefone') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="tipo_veiculo_id" class="form-label">Tipo do Veiculo</label>
                        <select class="form-select" aria-label=".form-select-lg example"
                            name="veiculo[tipo_veiculo_id]">
                            <option></option>
                            @foreach ($tipoVeiculos as $tipoVeiculo)
                                <option value="{{$tipoVeiculo->id}}">{{$tipoVeiculo->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" id="placa"
                            class="form-control text-uppercase {{ $errors->has('placa') ? 'is-invalid' : '' }}"
                            name="veiculo[placa]" value="{{ old('placa') }}" aria-describedby="placaValidationFeedback">
                        <div id="placaValidationFeedback" class="invalid-feedback">
                            <span>{{ $errors->first('placa') }}</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <span class="d-block form-label">Pagamento</span>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="pago"
                                class="form-check-input {{ $errors->has('status_pagamento') ? 'is-invalid' : '' }}"
                                name="estadia[status_pagamento]" value="1"
                                {{ old('status_pagamento') === '1' ? 'checked' : ' ' }}
                                aria-describedby="pagamentoValidationFeedback">
                            <label for="pago" class="form-check-label">Pago</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="pendente"
                                class="form-check-input {{ $errors->has('status_pagamento') ? 'is-invalid' : '' }}"
                                name="status_pagamento" value="0"
                                {{ old('status_pagamento') === '0' ? 'checked' : ' ' }}
                                aria-describedby="pagamentoValidationFeedback">
                            <label for="pendente" class="form-check-label">Pendente</label>
                        </div>
                        <div id="pagamentoValidationFeedback"
                            class="invalid-feedback {{ $errors->has('status_pagamento') ? 'd-block' : '' }}">Selecione o
                            status do pagamento</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/vagas/register.js') }}"></script>
@endsection
