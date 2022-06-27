<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use App\Rules\Cpf;


class StoreUpdateVaga extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome_visitante' => ['required', 'string', 'min:4', 'max:50'],
            'cpf' => ['required', new Cpf],
            'placa' => ['regex:/^[A-Z]{3}[0-9][0-9A-Z][0-9]{2}$/', 'unique:vagas,placa'],
            'acesso' => ['required', 'date', 'before:' . Carbon::now(), 'after:' . Carbon::now()->subDays(1)],
            'status_pagamento' => ['required', 'boolean']
        ];
    }

    public function messages()
    {

        return [
            'placa.regex' => 'Placa inválida'
        ];
    }
}
