<?php

namespace App\Models;

use App\Entities\Estado;
use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $table            = 'estado';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Estado::class;
    protected $allowedFields    = ['nome'];


}
