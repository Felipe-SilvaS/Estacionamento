<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = ['nome_visitante', 'cpf','celular', 'placa', 'status_pagamento'];

    public function acesso(): Attribute
    {
        return Attribute::set(fn ($value) => Carbon::now());
    }

    // public function setAcessoAttribute($value)
    // {
    //     return $this->attributes['acesso'] = Carbon::now();
    // }

    public function tipoVeiculo()
    {
        return $this->belongsTo(TipoVeiculo::class);
    }
}
