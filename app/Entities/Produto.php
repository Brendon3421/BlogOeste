<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produto extends Entity
{
    protected $datamap = [
        'id' => null,
        'nome' => null,
        'valor' => null,
        'usuario_id' => null,
        'meracado_id' => null,
        'codigo_barra' => null,
        'quantidade' => null,
        'data_entrada' => null,
        'data_vencimento' => null,
        'peso' => null,
        'descricao' => null,
        'status_id' => null,
        'created_at' => null,

    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
