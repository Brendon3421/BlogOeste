<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComentariosModel;
use CodeIgniter\HTTP\ResponseInterface;

class ComentariosController extends BaseController
{

    protected $_comentarioModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->_comentarioModel = new ComentariosModel();
    }

    public function index()
    {
        return view('saibaMaisEvento');
    }
    public function add()
    {   
        
        if ($this->request->getMethod() === 'post') {
            $nome = $this->request->getPost('nome');
            $evento_id = $this->request->getPost('evento_id');
            $imgs = $this->request->getFile('imagem');
            $descricao = $this->request->getPost('descricao');
            
            if (!$imgs->hasMoved()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move('assets/imagesComent/', $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }

            $data = [
                'nome' => removeSpecialChars($nome),
                'evento_id' =>  $evento_id,
                'email' => $this->request->getPost('email'),
                'nome' => removeSpecialChars($nome),
                'descricao' => $descricao,
                'imagem' => 'assets/imagesComent/' . $novoNomeImagem,
            ];
            // debug($data);
            
            $this->_comentarioModel->insert($data);
            session()->setFlashdata('message', 'comentario adicionado com sucesso');
            return redirect()->to("SaibaMais/Evento/{$evento_id}");
        } else {
            session()->setFlashdata('messageErro', 'Erro ao tentar registrar, verifique os campos');
            return redirect()->to("SaibaMais/Evento/{$evento_id}");
        }
    }
    public function verConta($id = null)
    {
        // Corrigindo o nome da variável para $comentarios
        $comentarios = $this->_comentarioModel->find($id);
    
        $data = [
            'comentarios' => $comentarios, // Corrigindo o nome da variável aqui também
        ];
        return view('saibaMaisEvento', $data);
    }
}
