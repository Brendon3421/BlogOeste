<?php

namespace App\Models;

use App\Entities\Comentarios;
use CodeIgniter\Model;

class ComentariosModel extends Model
{
    protected $table            = 'comentarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Comentarios::class;
    protected $allowedFields    = [    'id',
    'evento_id',
    'nome',
    'email',
    'descricao',
    'imagem'];


}
