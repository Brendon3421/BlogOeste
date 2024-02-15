<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $attributes = [
        'id' => null,
        'nome' => null,
        'senha' => null,
        'email' => null,
        'cpf' => null,
        'numero' => null,
        'data_nascimento' => null,
        'imagem' => null,
        'id_genero' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
