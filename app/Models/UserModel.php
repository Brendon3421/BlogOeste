<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $returnType = User::class;
    protected $allowedFields = ['nome', 'senha', 'email', 'cpf', 'numero', 'data_nascimento','imagem','genero_id'];


    public function authenticate($nome, $senha)
    {
        $modelUser = $this->where('nome', $nome)->first();
        
        
        // debug($modelUser);
        if ($modelUser && password_verify($senha, $modelUser->senha))
        {
             
             return $modelUser;
        } else {
            return null;
        }
    
    }

 
}


