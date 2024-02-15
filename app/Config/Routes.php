<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('usuarios', 'UsuariosController::index');
$routes->post('loginProcessamento', 'UsuariosController::loginUsuario');

$routes->get('home', 'ModuloController::index' );

$routes->get('admin/login', 'AdminController::indexLogin');
$routes->post('admin/processar-login', 'MercadoController::loginMercado');

$routes->get('admin', 'AdminController::index', );
$routes->post('Admin/cadastrar', 'AdminController::add');



$routes->get('logout', 'UsuariosController::logout');
$routes->get('usuarios/adicionar', 'UsuariosController::adicionar');
$routes->post('usuarios/add', 'UsuariosController::add');
$routes->get('usuarios/filtro', 'UsuariosController::filtrarUsuarios');
$routes->get('usuarios/listar', 'UsuariosController::verUsuario');
$routes->get('usuarios/edit/(:num)', 'UsuariosController::editIndex/$1');
$routes->post('usuarios/edit/(:num)', 'UsuariosController::edit/$1');
$routes->get('usuarios/excluir/(:num)', 'UsuariosController::deletar/$1');

// Conta do Usuario
$routes->get('usuarios/dados/(:num)', 'UsuariosController::verConta/$1',['filter'=>'auth']);
$routes->post('usuarios/editado/(:num)', 'UsuariosController::edit/$1');



$routes->get('modulo/Conta','EventoController::listar'); 
$routes->post('modulo/Conta/editar/(:num)', 'EventoController::edit/$1');


$routes->get('produto/lista/editar/(:num)', 'EventoController::editIndex/$1');
$routes->post('produto/lista/editar/(:num)', 'EventoController::edit/$1');


$routes->get('produto/excluir/(:num)', 'EventoController::deletar/$1');



$routes->get('cadastro/Evento/blog','EventoController::index',['filter'=>'auth']);
$routes->post('processamento-adicionar/Evento','EventoController::adicionarEvento'); 


$routes->get('visualizar/Evento/blog','EventoController::visualizarEventosFiltrar',['filter'=>'auth']);
$routes->get('evento/blog/filter','EventoController::visualizarEventosFiltrar',['filter'=>'auth']);
$routes->get('SaibaMais/Evento/(:num)', 'EventoController::saibaMais/$1',['filter'=>'auth']);

$routes->post('comentarios/adicionar','ComentariosController::add');
//editar noticia 
$routes->get('SaibaMais/Evento/Edit/(:num)', 'EventoController::indexEdit/$1', ['filter' => 'auth']);

$routes->post('processamento-adicionar/Evento/editar/(:num)', 'EventoController::editarNoticia/$1',['filter'=>'auth']);





