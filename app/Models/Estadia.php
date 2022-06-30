<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadia extends Model
{
    use HasFactory;

    protected $fillable = ['data_acesso', 'status_pagamento', 'veiculo_id', 'preco_id'];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function preco()
    {
        return $this->belongsTo(Preco::class);
    }


}
