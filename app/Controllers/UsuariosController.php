<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UsuariosController extends BaseController
{



    protected $_modelUser;
    protected $session;
    // Validações do formulário
    protected $validationRules = [
        'nome' => 'is_unique[usuario.nome]|required|alpha_space|min_length[3]|max_length[50]',
        'senha' => 'required|min_length[6]|max_length[255]',
        'confirmar_senha' => 'required|matches[senha]',
        'email' => 'required|valid_email|is_unique[usuario.email]|max_length[100]',
        'cpf' => 'required|is_unique[usuario.cpf]|exact_length[14]',
        'numero' => 'required|is_unique[usuario.numero]',
        'data_nascimento' => 'required',
        'genero_id' => 'required',

    ];
    protected $validation = [
        'nome' => 'alpha_space|min_length[3]|max_length[50]',
        'email' => 'valid_email|max_length[100]',


    ];


    public function __construct()
    {
        $this->_modelUser = new UserModel();


        helper('aux');
    }


    public function index()
    {


        return view('user_login');
    }


    public function adicionar()
    {
        return view('user_adicionar');
    }


    public function add()
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->validationRules);


        if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {

            $imgs = $this->request->getFile('imagem');

            if (!$imgs->hasMoved()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move('assets/images', $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }




            $senha = $this->request->getPost('senha');

            $data = [
                'nome' => $this->request->getPost('nome'),
                'senha' => password_hash($senha, PASSWORD_DEFAULT), // Hash da senha
                'email' => $this->request->getPost('email'),
                'cpf' => $this->request->getPost('cpf'),
                'numero' => $this->request->getPost('numero'),
                'data_nascimento' => $this->request->getPost('data_nascimento'),
                'imagem' => 'assets/images/' . $novoNomeImagem,
                'genero_id' => $this->request->getPost('genero_id'),


            ];

            // debug($data);

            $this->_modelUser->insert($data);
            session()->setFlashdata('message', 'Cadastro adicionado com sucesso');
            return redirect()->to('usuarios');
        } else {
            $erros = $validation->getErrors();
            session()->setFlashdata('erros', $erros);
            return redirect()->to('usuarios/adicionar');
        }
    }


    public function loginUsuario()
    {
        $nome = $this->request->getPost('nome');
        $senha = $this->request->getPost('senha');

        $user = $this->_modelUser->authenticate($nome, $senha);
        // $caminhoImagem = $this->_modelUser->getCaminhoImagem($user_id);

        if ($user) {
            $user_data = [
                'tipoUsuario' => 2,
                'user_id' => true,
                'usuario_id' => $user->id,
                'nome' => $user->nome,
                'mercado_id' => $user->mercado_id,
                'data_login' => br2bd(date('Y-m-d')),
                'imagem' => $user->imagem,
            ];

            session()->set('imagem', 'assets/images/'. $user->imagem);

            session()->set($user_data);
            // debug($user_data);
            return redirect()->to('home');
        } else {
            session()->setFlashdata('errologin', 'Erro ao tentar logar! Verifique suas credenciais');
            return redirect()->to('usuarios');
        }
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('usuarios');
    }

    public function verUsuario()
    {

        $user_id = session()->get('user_id');
        if (empty($user_id)) {
            session()->setFlashdata('error', 'Você não está logado para acessar essa página');
            return redirect()->to('/');
        }

        $usuarios = $this->_modelUser
            ->select('usuario.*,genero.nome as nome_genero')
            ->join('genero', 'genero.id = usuario.genero_id')
            ->where('usuario.id', $user_id)
            ->findAll();



        $data = ['genero' => $this->_modelUser->findAll(), 'usuarios' => $usuarios];

        // debug($data);
        return view('usuario_ver', $data);
    }

    public function filtrarUsuarios()
    {
        if (empty($usuario)) {
            return redirect()->to('usuarios');
        }



        // Obtenha os parâmetros de filtro do formulário
        $filtro_nome = $this->request->getGet('filtro_nome');
        $filtro_numero = $this->request->getGet('filtro_numero');
        $filtro_email = $this->request->getGet('filtro_email');
        $filtro_cpf = $this->request->getGet('filtro_cpf');
        $filtro_nascimento = $this->request->getPost('filtro_nascimento');


        $usuarios = $this->_modelUser;

        if (!empty($filtro_nome)) {
            $usuarios->like('usuario.nome', $filtro_nome);
        }

        if (!empty($filtro_numero)) {
            $usuarios->like('usuario.numero', $filtro_numero);
        }

        if (!empty($filtro_email)) {
            $usuarios->like('usuario.email', $filtro_email);
        }

        if (!empty($filtro_cpf)) {
            $usuarios->like('usuario.cpf', $filtro_cpf);
        }


        if (!empty($filtro_nascimento)) {
            $usuarios->like('usuario.data_nascimento', $filtro_nascimento);
        }

        $usuarios = $usuarios->findAll();

        $data = [
            'genero' => $this->_modelUser->findAll(),
            'usuarios' => $usuarios,
            'filtro_nome' => $filtro_nome,
            'filtro_email' => $filtro_email,
            'filtro_cpf' => $filtro_cpf,
            'filtro_nascimento' => $filtro_nascimento,
        ];

        // debug($filtro_nascimento);

        return view('usuario_ver', $data);
    }



    public function editIndex($id = null)
    {

        $usuario = $this->_modelUser->find($id);

        $data = [
            'usuario' => $usuario,
        ];

        return view('contaUser', $data);
    }


    public function edit($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules($this->validation);

        $usuario = $this->_modelUser->find($id);

        if (empty($usuario)) {
            return redirect()->to('usuarios');
        }

        $imgs = $this->request->getFile('imagem');


        if ($imgs && $imgs->isValid()) {
            if (!$imgs->hasMoved()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move('assets/images', $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            } else {

                $novoNomeImagem = $imgs->getName();
            }
        } else {
            $novoNomeImagem = $usuario->imagem;
        }

        $senha = $this->request->getPost('senha');


        if ($this->request->getMethod() === 'post') {
            $data = [
                'nome' => $this->request->getPost('nome'),
                'email' => $this->request->getPost('email'),
                'numero' => $this->request->getPost('numero'),
                'data_nascimento' => $this->request->getPost('data_nascimento'),
                'imagem' =>  'assets/images/' . $novoNomeImagem,
                'genero_id' => $this->request->getPost('genero_id'),
            ];


            if (!empty($senha)) {
                $data['senha'] = password_hash($senha, PASSWORD_DEFAULT);
            } else {
                $senha = null;
            }
            $data['updated_at'] = date('Y-m-d H:i:s');

            // debug($data);

            if ($validation->run($data)) {
                $this->_modelUser->update($id, $data);
                session()->setFlashdata('sucess', 'Usuário alterado com sucesso');
                return redirect()->to("usuarios/edit/{$id}");
            } else {
                $erros = $validation->getErrors();
                session()->setFlashdata('erros', $erros);
                return redirect()->to("usuarios/edit/{$id}");
            }
        }
    }


    public function verConta($id = null)
    {

        $usuario = $this->_modelUser->find($id);

        $data = [
            'usuario' => $usuario,
        ];
        return view('contaUser', $data);
    }

    public function deletar($id)
    {
        $this->_modelUser->delete($id);
        return redirect()->to("usuarios/listar");
    }
}
