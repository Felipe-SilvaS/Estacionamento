<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable =  ['nome_proprietario', 'cpf', 'celular', 'telefone', 'placa', 'tipo_veiculo_id'];

    public function estadia()
    {
        return $this->hasOne(Estadia::class);
    }

    public function tipoVeiculo()
    {
        return $this->belongsTo(TipoVeiculo::class);
    }
}
