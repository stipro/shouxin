<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de colaboradores
 */
class colaboradoresController extends Controller
{
  function __construct()
  {
    
    // Validación de sesión de usuario, descomentar si requerida
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
    if ($_SESSION['user_session_shouxin']['user']['typecollaborator'] != 'Administrador') {
      Flasher::new('No tienes permitido este modulo.', 'danger');
      Redirect::to('home/flash');
    }
  }

  function index()
  {
    $data =
      [
        'title' => 'Colaboradores',
        'nameModule' => 'colaboradores',
        'msg'   => 'Bienvenido al controlador de "colaboradores", se ha creado con éxito si ves este mensaje.',
        'padding' => '0px'
      ];

    // Descomentar vista si requerida
    View::render('index', $data);
  }

  function ver($id)
  {
    View::render('ver');
  }

  function agregar()
  {
    View::render('agregar');
  }

  function post_agregar()
  {
  }

  function editar($id)
  {
    View::render('editar');
  }

  function post_editar()
  {
  }

  function borrar($id)
  {
    // Proceso de borrado
  }
}
