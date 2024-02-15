<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CatgoriaModel;
use CodeIgniter\Controller;

class CategoriaController extends BaseController
{   
    protected $categoriaModel;
    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[255]|is_unique[categoria.nome]'
    ];

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    public function index()
    {
        return view("categoria_add");
    }

    public function add()
    {
        $validation = \Config\Services::validation();    
        $validation->setRules($this->validationRules);

        if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run())
        {
            $nome = $this->request->getPost('nome');

            $data = [
                'nome' => removeSpecialChars($nome), 
            ];

            $this->categoriaModel->insert($data);
            session()->setFlashdata('message', 'Categoria de produto adicionada com sucesso');
            return redirect()->to('modulo/produto');
        }
        else
        {
            session()->setFlashdata('messageErro', 'Erro ao tentar registrar, verifique os campos ou nome ja existe');
            return redirect()->to('modulo/modulo/categoria/add');
        }
    }
}
?>
