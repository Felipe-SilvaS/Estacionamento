<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVeiculo extends Model
{
    use HasFactory;

    public function vaga(){
        return $this->hasOne(Vaga::class);
    }

    public function veiculo(){
        return $this->hasMany(Veiculo::class);
    }
}
