<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Comentarios extends Entity
{



      protected $attributes = [
        'id' => null,
        'evento_id' => null,
        'nome' => null,
        'email' => null,
        'descricao' => null,
        'imagem' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
