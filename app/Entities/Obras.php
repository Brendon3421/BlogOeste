<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Obras extends Entity
{
    protected $attributes = [
        'id'=>null,
        'usuario_id'=>null,
        'nome'=>null,
        'cep'=>null,
        'rua'=>null,
        'bairro'=>null,
        'cidade'=>null,
        'estado'=>null,
        'ibge'=>null,
        'ddd'=>null,
        'gia'=>null,
        'imagem'=>null,
        'descricao'=>null,
        'longitude'=>null,
        'latitude'=>null,
    
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
