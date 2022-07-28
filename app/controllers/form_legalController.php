<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de form_legal
 */
class form_legalController extends Controller
{
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    /**
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
     */
  }

  function index()
  {
    if (Auth::validate()) {
      Flasher::new('Regresa al formulario Legal.', 'succes');
      Redirect::to('form_legal/colaborador');
    }
    $data =
      [
        'title' => 'Formulario legal',
        'nameModule' => 'form_legal',
        'msg'   => 'Bienvenido al controlador de "form_legal", se ha creado con éxito si ves este mensaje.'
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

  function colaborador()
  {
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
    View::render('colaborador', ['title' => 'colaborador', 'user' => User::profile(), 'nameModule' => 'formLegal-colaborador', 'padding' => '0px']);
  }
}
