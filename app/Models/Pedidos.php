<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'userId',
        'endereco',
        'description',
        'status',
        'imagem',
        "cep",
        "numero",
        "estado"
    ];
}
