@extends('layouts.base')

@section('content-header')
    <h2 class="fs-2">Quantida de vagas</h2>
@endsection

@section('content')
    @include('layouts.partials.message')

    <div class="card">
        <div class="card-header">
            <span>Cadastro de quantidade vagas por tipo de veículo</span>
        </div>
        <div class="card-body">
            <form action="{{ route('vagas.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    @foreach ($tipoVeiculos as $tipoVeiculo)
                        <div class="col-md-6">
                            <label for="{{ $tipoVeiculo->nome }}" class="form-label">Vagas para
                                {{ $tipoVeiculo->nome }}</label>
                            <input type="text" id="{{ $tipoVeiculo->nome }}"
                                class="form-control {{ $errors->has('nome_proprietario') ? 'is-invalid' : '' }}"
                                name="{{ $tipoVeiculo->nome }}[total]" value="{{ old($tipoVeiculo->nome) }}"
                                aria-describedby="{{ $tipoVeiculo->nome }}nomeValidationFeedback">
                            <div id="{{ $tipoVeiculo->nome }}nomeValidationFeedback" class="invalid-feedback">
                                <span>{{ $errors->first($tipoVeiculo->nome) }}</span>
                            </div>
                        </div>
                        <input type="hidden" name="{{ $tipoVeiculo->nome }}[tipo_veiculo_id]" value="{{ $tipoVeiculo->id }}">
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/vagas/register.js') }}"></script>
@endsection
