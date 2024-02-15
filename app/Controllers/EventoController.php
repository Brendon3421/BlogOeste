<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComentariosModel;
use App\Models\EstadoModel;
use App\Models\EventoModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\HTTP\ResponseInterface;

class EventoController extends BaseController
{

    protected $_comentarioModel;
    protected $_modelEvento;
    protected $_modelEstado;
    protected $validation;
    protected $validationRules;
    protected $session;
    protected $_modelUsuario;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->_modelEvento = new EventoModel;
        $this->_modelEstado = new EstadoModel();
        $this->_comentarioModel = new ComentariosModel();
        $this->_modelUsuario = new UserModel();
        $this->validation->setRules([
            'nome' => 'required|alpha_space|min_length[3]|max_length[50]',
            'cep' => 'required|alpha_dash',
            'descricao' => 'required|alpha_dash|max_length[800]',
            'imagem' => 'uploaded[imagem],is_imagem[imagem]|max_size[imagem,2048]|ext_in[imagem,png,jpg,jpeg,gif]'
        ]);
        $this->validationRules = \Config\Services::validation();
        $this->validationRules->setRules([
            'nome' => 'alpha_space|min_length[3]|max_length[50]',
            'cep' => 'alpha_dash',
            'descricao' => 'alpha_dash|max_length[800]',
            'imagem' => 'uploaded[imagem],is_imagem[imagem]|max_size[imagem,2048]|ext_in[imagem,png,jpg,jpeg,gif]'
        ]);
    }



    public function index()
    {
        // Buscar estados do banco de dados
        $data['estados'] = $this->_modelEstado->findAll();

        return view('adicionaraoblog', $data);
    }




    public function adicionarEvento()
    {

        // $teste = 'oi';

        if ($this->request->getMethod() === 'post') {

            $user_id = session()->get('usuario_id');
            if (empty($user_id)) {
            };


            $nome = $this->request->getPost('nome');
            $imgs = $this->request->getFile('imagem');
            $cep = $this->request->getPost('cep');
            $video = $this->request->getFile('videos');



            if (!$imgs->hasMoved()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move('assets/imagesEvento/', $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }
            if (!$video->hasMoved()) {
                $novoVideo = $video->getName();
                $video->move('assets/video/', $novoVideo);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }


            $data = [
                'usuario_id' => $user_id,
                'nome' => removeSpecialChars($nome),
                'email' => $this->request->getPost('email'),
                'rua' => $this->request->getPost('rua'),
                'cep' => removerHifens($cep),
                'bairro' => $this->request->getPost('bairro'),
                'estado' => $this->request->getPost('estado'),
                'cidade' => $this->request->getPost('cidade'),
                'ibge' => $this->request->getPost('ibge'),
                'ddd' => $this->request->getPost('ddd'),
                'gia' => $this->request->getPost('gia'),
                'imagem' => 'assets/imagesEvento/' . $novoNomeImagem,
                'video' => 'assets/video/' . $novoVideo,
                'descricao' => $this->request->getPost('descricao'),
                'longitude' => $this->request->getPost('longitude'),
                'latitude' => $this->request->getPost('latitude'),
            ];

            // debug($data);:

            $this->_modelEvento->insert($data);
            session()->setFlashdata('sucess', 'Evento Foi adicionada com sucesso');
            return redirect()->to('cadastro/Evento/blog');
        } else {
            $erros = $this->validation->getErrors();
            session()->setFlashdata('erros', $erros);
            return redirect()->to('cadastro/Evento/blog');
        }
    }


    public function visualizarEventosFiltrar()
    {
        // Obtenha os parâmetros de filtro do formulário
        $filtro_titulo = $this->request->getGet('filtro_nome');
        $filtro_cidade = $this->request->getGet('filtro_cidade');
        $filtro_estado = $this->request->getGet('filtro_estado');
        $filtro_rua = $this->request->getGet('filtro_rua');
        $filtro_cep = $this->request->getPost('filtro_cep');

        $this->_modelEvento->select('evento.*, evento.nome,evento.cidade, evento.rua, evento.cep');

        if (!empty($filtro_titulo)) {
            $this->_modelEvento->like('evento.nome', $filtro_titulo);
        }

        if (!empty($filtro_cidade)) {
            $this->_modelEvento->like('evento.cidade', $filtro_cidade);
        }

        if (!empty($filtro_estado)) {
            $this->_modelEvento->like('evento.estado', $filtro_estado);
        }

        if (!empty($filtro_rua)) {
            $this->_modelEvento->like('evento.rua', $filtro_rua);
        }

        if (!empty($filtro_cep)) {
            $this->_modelEvento->like('evento.cep', $filtro_cep);
        }

        // Execute a consulta
        $eventos = $this->_modelEvento->findAll();

        $data = [
            'eventos' => $eventos,
            'filtro_titulo' => $filtro_titulo,
            'filtro_cidade' => $filtro_cidade,
            'filtro_estado' => $filtro_estado,
            'filtro_rua' => $filtro_rua,
            'filtro_cep' => $filtro_cep,
        ];

        return view('visualizarEvento', $data);
    }

    public function indexEdit($id = null)
    {
        // Encontrar o evento pelo ID
        $event = $this->_modelEvento->find($id);

        $data = [
            'event' => $event,
        ];

        return view('editarNoticia', $data);
    }

    public function editarNoticia($id = null)
    {
        $event = $this->_modelEvento->find($id);

        // Verificar se o evento existe
        $user_id = session()->get('usuario_id');
        if (empty($user_id)) {
        };

        if ($this->request->getMethod() === 'post') {
    
            $nome = $this->request->getPost('nome');
            $imgs = $this->request->getFile('imagem');
            $cep = $this->request->getPost('cep');
            $video = $this->request->getFile('videos');
    
            // Verificar se novas imagens ou vídeos foram enviados
            if ($imgs && $imgs->isValid()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move( $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            } else {
                $novoNomeImagem = $event->imagem; // Mantenha a imagem existente
            }
    
            if ($video && $video->isValid()) {
                $novoVideo = $video->getName();
                $video->move( $novoVideo);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            } else {
                $novoVideo = $event->video; // Mantenha o vídeo existente
            }
    
            $data = [
                'usuario_id' => $user_id,
                'nome' => removeSpecialChars($nome),
                'email' => $this->request->getPost('email'),
                'rua' => $this->request->getPost('rua'),
                'cep' => removerHifens($cep),
                'bairro' => $this->request->getPost('bairro'),
                'estado' => $this->request->getPost('estado'),
                'cidade' => $this->request->getPost('cidade'),
                'ibge' => $this->request->getPost('ibge'),
                'ddd' => $this->request->getPost('ddd'),
                'gia' => $this->request->getPost('gia'),
                'imagem' =>  $novoNomeImagem,
                'video' => $novoVideo,
                'descricao' => $this->request->getPost('descricao'),
                'longitude' => $this->request->getPost('longitude'),
                'latitude' => $this->request->getPost('latitude'),
            ];
    
            // debug($data);
    
            $this->_modelEvento->update($id, $data);
            session()->setFlashdata('sucess', 'Evento foi editado com sucesso');
            return redirect()->to('cadastro/Evento/blog');
        } else {
            $erros = $this->validation->getErrors();
            session()->setFlashdata('erros', $erros);
            return redirect()->to('cadastro/Evento/blog');
        }
    }


    public function saibaMais($id = null)
    {

        $event = $this->_modelEvento->find($id);
        $comentarios = $this->_comentarioModel->where('evento_id', $id)->findAll();
        $data = [
            'event' => $event,
            'comentarios' => $comentarios,
        ];
        // debug($data);
        return view('saibaMaisEvento', $data);
    }
}
