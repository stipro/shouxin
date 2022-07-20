<?php

/**
 * La primera función de pruebas del curso de creando el framework MVC
 *
 * @return void
 */
function en_custom()
{
  return 'ESTOY DENTRO DE CUSTOM_FUNCTIONS.';
}

/**
 * Carga las diferentes divisas soporatadas en el proyecto de pruebas
 *
 * @return void
 */
function get_coins()
{
  return
    [
      'MXN',
      'USD',
      'CAD',
      'EUR',
      'ARS',
      'AUD',
      'JPY'
    ];
}

function get_all_nacionalidades()
{
  $select = array();
  $allPaises = paisesModel::all();
  foreach ($allPaises as $clPais) {
    if ($clPais['singularMasculino'] !== ";") {
      $item = [$clPais['singularMasculino'], $clPais['id_pais'], $clPais['singularMasculino']];
      array_push($select, $item);
    }
  }
  return $select;
}

function get_all_paises()
{
  $select = array();
  $allPaises = paisesModel::all();
  foreach ($allPaises as $clPais) {
    $item = [$clPais['nombre_pais'], $clPais['id_pais'], $clPais['nombre_pais']];
    array_push($select, $item);
  }
  return $select;
}
