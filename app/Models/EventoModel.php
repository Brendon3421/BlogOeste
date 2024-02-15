<?php

namespace App\Models;

use App\Entities\EventoEntity;
use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table            = 'evento';
    protected $primaryKey       = 'id';
    protected $returnType       = EventoEntity::class;
    protected $allowedFields    = [
    'usuario_id',
    'nome',
    'email',
    'cep',
    'rua',
    'bairro',
    'cidade',
    'estado',
    'ibge',
    'ddd',
    'gia',
    'imagem',
    'video',
    'descricao',
    'longitude',
    'latitude',

    ];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
