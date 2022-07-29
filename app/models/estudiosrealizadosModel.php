<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de estudiosrealizados
 */
class estudiosrealizadosModel extends Model
{
  public static $t1   = 'colaborador_estudiosrealizados'; // Nombre de la tabla en la base de datos;

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
    $sql = 'SELECT * FROM colaborador_estudiosrealizados ORDER BY colaborador_id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM colaborador_estudiosrealizados WHERE colaborador_id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function all_paginated($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM colaborador_estudiosrealizados WHERE colaborador_id = :id ORDER BY colaborador_id ASC';
    return PaginationHandler::paginate($sql, ['id' => $id]);
    //return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function get_experienciaRealizados($colaborador_id)
  {
    // Todos los registros
    $sql = 'SELECT cl_er.colaborador_id, cl_er.centroEducativo_estudioRealizado, cl_er.nivelEstudio_estudioRealizado, cl_er.cursandoActualmente_estudioRealizado, cl_er.nombreArchivoCertificado_estudiosRealizados, cl_er.inicio_estudiosrealizados, cl_er.final_estudiosrealizados FROM colaborador_estudiosrealizados cl_er WHERE colaborador_id = :colaborador_id ORDER BY colaborador_id DESC';
    return ($rows = parent::query($sql, ['colaborador_id' => $colaborador_id])) ? $rows[0] : [];
  }
}
