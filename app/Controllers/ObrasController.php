<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstadoModel;
use App\Models\ObrasModel;
use CodeIgniter\HTTP\ResponseInterface;

class ObrasController extends BaseController
{
        protected $_modelObras;     
        protected $_modelEstado;
        protected $validation;
        protected $validationRules;
        protected $session;
    
    
        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->_modelObras = new ObrasModel();
            $this->_modelEstado = new EstadoModel();
            $this->validation->setRules([
                'nome' =>'required|alpha_space|min_length[3]|max_length[50]',
                'cep' => 'required|alpha_dash',
                'descricao' => 'required|alpha_dash|max_length[800]',
                'transparenciaativa' => 'uploaded[transparenciaativa]|ext_in[transparenciaativa,pdf]',
            ]);
        }
    
        
    
        public function index()
        {
            $data['estado'] = $this->_modelEstado->findAll();

            return view('cadastroObra', $data);
        }
    
        public function adicionarObra(){
    
    // $teste = 'oi';
    
    if ($this->request->getMethod() === 'post' ) 
    {
    
        $user_id = session()->get('usuario_id');
            if(empty($user_id)){
            };
        
            $teste = 'oi';
            $nome = $this->request->getPost('nome');
            $imgs = $this->request->getFile('imagem');
            $cep = $this->request->getPost('cep');
            $pdf = $this->request->getFile('transparenciaativa');
            
            if (!$imgs->hasMoved()) {
                $novoNomeImagem = $imgs->getName();
                $imgs->move('assets/imagesObra/' , $novoNomeImagem);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }
            
            
            if (!$pdf->hasMoved()) {
                $pdfNovo = $pdf->getName();
                $pdf->move('assets/pfg/' , $pdfNovo);
                session()->setFlashdata('upload', 'Upload bem-sucedido');
            }
            
            $data = [
                    'usuario_id' => $user_id,
                    'nome' =>removeSpecialChars($nome), 
                    'rua' =>$this->request->getPost('rua'),
                    'cep' =>removerHifens($cep),
                    'bairro' =>$this->request->getPost('bairro'),
                    'estado' =>$this->request->getPost('estado'),
                    'cidade' =>$this->request->getPost('cidade'),
                    'ibge' =>$this->request->getPost('ibge'),
                    'ddd' =>$this->request->getPost('ddd'),
                    'gia' =>$this->request->getPost('gia'),
                    'imagem' => 'assets/imagesEvento/' . $novoNomeImagem,
                    'descricao' =>$this->request->getPost('descricao'),
                    'longitude' =>$this->request->getPost('longitude'),
                    'latitude' =>$this->request->getPost('latitude'),
                    'processo' =>$this->request->getPost('processo'),
                    'anodeatucao' =>$this->request->getPost('anodeatucao'),
                    'tipodeprocesso' =>$this->request->getPost('tipodeprocesso'),
                    'undidadetecnicaresponsavel' =>$this->request->getPost('undidadetecnicaresponsavel'),
                    'unidadedresponsavelaigr' =>$this->request->getPost('unidadedresponsavelaigr'),
                    'relator' =>$this->request->getPost('relator'),
                    'estado' =>$this->request->getPost('estado'),
                    'assuntoprocesso' =>$this->request->getPost('assuntoprocesso'),
                    'unidadesjurisdicionadas' =>$this->request->getPost('unidadesjurisdicionadas'),
                    'trasparenciaativa' => 'assets/pdf/' . $pdfNovo,
                    'valor' =>$this->request->getPost('valor'),
                    
                ];
                
                // debug($data);
                
                $this->_modelObras->insert($data);
                session()->setFlashdata('sucess', 'Evento Foi adicionada com sucesso');
                return redirect()->to('cadastro/Obras');
            }
            else
            {
                $erros = $this->validation->getErrors();
                session()->setFlashdata('erros', $erros);
                return redirect()->to('cadastro/Obras');
            }
        }
            
        public function blogIndex(){
            return view('adicionaraoblog');
        }
    
    }

