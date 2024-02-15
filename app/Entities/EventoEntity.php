<?php

namespace App\Entities;

use Attribute;
use CodeIgniter\Entity\Entity;

class EventoEntity extends Entity
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
        'video'=>null,
        'descricao'=>null,
        'longitude'=>null,
        'latitude'=>null,
        'processo'=>null,
        'anodeatuacao'=>null,
        'tipodeprocesso'=>null,
        'undidadetecnicaresponsavel'=>null,
        'unidadedresponsavelaigr'=>null,
        'relator'=>null,
        'estado'=>null,
        'assuntoprocesso'=>null,
        'unidadesjurisdicionadas'=>null,
        'trasparenciaativa'=>null,
        'valor'=>null,
    ];

    
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
