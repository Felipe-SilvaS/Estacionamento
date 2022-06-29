<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadia extends Model
{
    use HasFactory;


    public function veiculo()
    {
        return $this->belongsTo(veiculo::class);
    }

    public function preco()
    {
        return $this->belongsTo(Preco::class);
    }


}
