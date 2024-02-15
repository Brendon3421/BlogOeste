<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Categoria extends Entity
{
    protected $attributes = [
        'id' => null,
        'nome' => null,
        'created_at' => null,

    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
