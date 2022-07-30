<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de colaborador
 */
class colaboradoresModel extends Model
{
  public static $t1   = 'colaboradores'; // Nombre de la tabla en la base de datos;

  // Nombre de tabla 2 que talvez tenga conexión con registros
  //public static $t2 = '__tabla 2___'; 
  //public static $t3 = '__tabla 3___'; 

  function __construct()
  {
    // Constructor general
  }

  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM colaboradores ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM colaboradores ORDER BY id_colaborador ASC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM colaboradores WHERE id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function colaborador_permitido($correo)
  {
    // Todos los registros
    $sql = 'SELECT cl.id_colaborador, cl.tipoColaborador_colaborador, cl.terminos_colaborador, cl.dateCreation_colaborador, cl.dateUpdate_colaborador FROM colaboradores cl WHERE correo_colaborador = :correo ORDER BY id_colaborador DESC';
    return ($rows = parent::query($sql, ['correo' => $correo])) ? $rows[0] : [];
  }
}
