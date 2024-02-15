<?php

namespace App\Models;

use App\Entities\Obras;
use CodeIgniter\Model;

class ObrasModel extends Model
{
    protected $table            = 'obras';
    protected $primaryKey       = 'id';
    protected $returnType       = Obras::class;
    protected $allowedFields    = [
    'usuario_id',
    'nome',
    'cep',
    'rua',
    'bairro',
    'cidade',
    'estado',
    'ibge',
    'ddd',
    'gia',
    'imagem',
    'descricao',
    'longitude',
    'latitude',
    'processo',
    'anodeatuacao',
    'tipodeprocesso',
    'undidadetecnicaresponsavel',
    'unidadedresponsavelaigr',
    'relator',
    'estado',
    'assuntoprocesso',
    'unidadesjurisdicionadas',
    'trasparenciaativa',
    'valor',
    ];
}
