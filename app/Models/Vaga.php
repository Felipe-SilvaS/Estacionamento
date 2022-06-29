<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_veiculo_id', 'quantidade'];

    public function tipoVeiculo()
    {
        return $this->belongsTo(TipoVeiculo::class);
    }
}
