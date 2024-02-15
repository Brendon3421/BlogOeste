<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ModuloController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if ($this->session->has('user_id')) {
            $data['user_id'] = $this->session->get('user_id');
            $data['nome'] = $this->session->get('nome');
            $data['mercado_id'] = $this->session->get('mercado_id');
    
           


            return view('includes/template', $data);
        } else {
            return redirect()->to('usuarios');
        }
    }

    public function indexMercado()
    {
        if ($this->session->has('isLoggedIn')) {
            
            $data['mercado_id'] = $this->session->get('mercado_id');
            $data['nome_mercado'] = $this->session->get('nome_mercado');
            
            return view('includes/template', $data);
        } else {
            return redirect()->to('mercado/login');
        }
    }
}
