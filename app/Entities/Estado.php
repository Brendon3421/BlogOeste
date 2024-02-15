<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Estado extends Entity
{
    protected $attributes = [
        'id' => null,
        'nome' => null,
        'created_at' => null,

    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
