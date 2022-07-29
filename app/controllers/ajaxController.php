<?php

class ajaxController extends Controller
{

  private $accepted_actions = ['get', 'post', 'put', 'delete', 'options', 'add', 'load'];
  private $required_params  = ['hook', 'action'];

  function __construct()
  {
    foreach ($this->required_params as $param) {
      if (!isset($_POST[$param])) {
        json_output(json_build(403));
      }
    }

    if (!in_array($_POST['action'], $this->accepted_actions)) {
      json_output(json_build(403));
    }
  }

  function index()
  {
    /**
    200 OK
    201 Created
    300 Multiple Choices
    301 Moved Permanently
    302 Found
    304 Not Modified
    307 Temporary Redirect
    400 Bad Request
    401 Unauthorized
    403 Forbidden
    404 Not Found
    410 Gone
    500 Internal Server Error
    501 Not Implemented
    503 Service Unavailable
    550 Permission denied
     */
    json_output(json_build(403));
  }

  function bee_add_movement()
  {
    try {
      $mov              = new movementModel();
      $mov->type        = $_POST['type'];
      $mov->description = $_POST['description'];
      $mov->amount      = (float) $_POST['amount'];
      if (!$id = $mov->add()) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $mov->id = $id;
      json_output(json_build(201, $mov->one(), 'Movimiento agregado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_get_movements()
  {
    try {
      $movements          = new movementModel;
      $movs               = $movements->all_by_date();

      $taxes              = (float) get_option('taxes') < 0 ? 16 : get_option('taxes');
      $use_taxes          = get_option('use_taxes') === 'Si' ? true : false;

      $total_movements    = $movs[0]['total'];
      $total              = $movs[0]['total_incomes'] - $movs[0]['total_expenses'];
      $subtotal           = $use_taxes ? $total / (1.0 + ($taxes / 100)) : $total;
      $taxes              = $subtotal * ($taxes / 100);

      $calculations       = [
        'total_movements' => $total_movements,
        'subtotal'        => $subtotal,
        'taxes'           => $taxes,
        'total'           => $total
      ];

      $data = get_module('movements', ['movements' => $movs, 'cal' => $calculations]);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_delete_movement()
  {
    try {
      $mov     = new movementModel();
      $mov->id = $_POST['id'];

      if (!$mov->delete()) {
        json_output(json_build(400, null, 'Hubo error al borrar el registro'));
      }

      json_output(json_build(200, null, 'Movimiento borrado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_update_movement()
  {
    try {
      $movement     = new movementModel;
      $movement->id = $_POST['id'];
      $mov          = $movement->one();

      if (!$mov) {
        json_output(json_build(400, null, 'No existe el movimiento'));
      }

      $data = get_module('updateForm', $mov);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_save_movement()
  {
    try {
      $mov              = new movementModel();
      $mov->id          = $_POST['id'];
      $mov->type        = $_POST['type'];
      $mov->description = $_POST['description'];
      $mov->amount      = (float) $_POST['amount'];
      if (!$mov->update()) {
        json_output(json_build(400, null, 'Hubo error al guardar los cambios'));
      }

      // se guardó con éxito
      json_output(json_build(200, $mov->one(), 'Movimiento actualizado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_save_options()
  {
    $options =
      [
        'use_taxes' => $_POST['use_taxes'],
        'taxes'     => (float) $_POST['taxes'],
        'coin'      => $_POST['coin']
      ];

    foreach ($options as $k => $option) {
      try {
        if (!$id = optionModel::save($k, $option)) {
          json_output(json_build(400, null, sprintf('Hubo error al guardar la opción %s', $k)));
        }
      } catch (Exception $e) {
        json_output(json_build(400, null, $e->getMessage()));
      }
    }

    // se guardó con éxito
    json_output(json_build(200, null, 'Opciones actualizadas con éxito'));
  }
  function get_colaboradorValido()
  {
    try {
      /* debug(productosModel::all_paginated());
      die; */

      $proveedor = $_POST['provider'];
      $correo = $_POST['email'];
      $apellidos = $_POST['family'];
      $nombre = $_POST['given'];
      $imagen = $_POST['picture'];
      $partCorreo = explode("@", $correo);

      $typeLogin = $partCorreo[1];
      $rptValidador_value = colaboradoresModel::colaborador_permitido($correo);
      $id_colaborador = $rptValidador_value['id_colaborador'];
      $tipoColaborador_colaborador = $rptValidador_value['tipoColaborador_colaborador'];
      $terminos_colaborador = $rptValidador_value['terminos_colaborador'];
      $dateCreation_colaborador = $rptValidador_value['dateCreation_colaborador'];
      $dateUpdate_colaborador = $rptValidador_value['dateUpdate_colaborador'];

      if (!$dateCreation_colaborador == $dateUpdate_colaborador) {
        json_output(json_build(400, null, 'Ya esta registrado, vas a modificar'));
      }
      if (!$typeLogin == 'shouxin.com.pe') {
        $data =
          [
            'correo_colaborador'        => $correo,
            'dateCreation_colaborador'  => now(),
            'dateUpdate_colaborador'    => now()
          ];
        if (!$id = colaboradoresModel::add(colaboradoresModel::$t1, $data)) {
          json_output(json_build(400, null, 'Hubo error al guardar el registro'));
        }
        if (!$rptValidador_value) {
          throw new PDOException('Correo no permitido.');
        }
      }
      $user =
        [
          'provider'           =>  $proveedor,
          'typeLogin'          =>  $typeLogin,
          'id'                 =>  $id_colaborador,
          'name'               =>  $nombre,
          'surname'            =>  $apellidos,
          'email'              =>  $correo,
          'avatar'             =>  $imagen,
          'typecollaborator'   =>  $tipoColaborador_colaborador,
          'terms'              =>  $terminos_colaborador,
          'tel'                => '11223344',
          'color'              => '#112233',
          'user'               => 'bee',
          'password'           => '$2y$10$R18ASm3k90ln7SkPPa7kLObcRCYl7SvIPCPtnKMawDhOT6wPXVxTS'
        ];

      // Loggear al usuario
      Auth::login($user['id'], $user);
      json_output(json_build(200, $rptValidador_value, 'Correo Valido, Bienvenido, Espereme un momento le redireccionaremos, Gracias'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }
  function getLogin_microsoft()
  {

    $tenant = "common";
    $client_id = "3b5a69e5-d9fb-443e-b5e7-926401d3a4e0";
    $client_secret = "Pwl8Q~gq4H~W103V3wPg_jot3jao1eG5c7yMUcig";
    $callback = "http://localhost/logins_auth/microsoft/index.php";
    $scopes = [
      "User.Read",
      'Files.Read.All'
    ];
    apiLoginMicrosoft($tenant, $client_id, $client_secret, $callback, $scopes);
  }

  function getDepartamentos_digemid()
  {


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://ms.digemid.minsa.gob.pe:8480/msopmcovid/parametro/departamentos',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"filtro":{"codigo":null,"codigoDos":null}}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Departamentos'));
  }

  function getDepartamentos_reniec()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://portaladminusuarios.reniec.gob.pe/duplicado/servicios/getDepartamentosNacim.do',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_HTTPHEADER => array(
        'Cookie: SameSite=None',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Departamentos'));
  }

  function getProvincias()
  {
    $codigoDepartamento = clean($_POST['department']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://ms.digemid.minsa.gob.pe:8480/msopmcovid/parametro/provincias',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"filtro":{"codigo":"' . $codigoDepartamento . '","codigoDos":null}}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Provincias'));
  }

  function getProvincias_reniec()
  {
    $codigoDepartamento = clean($_POST['department']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://portaladminusuarios.reniec.gob.pe/duplicado/servicios/getProvinciasNacim.do',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"coDepartamento":"' . $codigoDepartamento . '"}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: SameSite=None'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Provincias'));
  }

  function getDistrito()
  {
    $codigoDepartamento = clean($_POST['department']);
    $codigoProvincia = clean($_POST['province']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://ms.digemid.minsa.gob.pe:8480/msopmcovid/parametro/distritos',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"filtro":{"codigo":"' . $codigoProvincia  . '","codigoDos":"' . $codigoDepartamento . '"}}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Distritos'));
  }

  function getDistrito_reniec()
  {
    $codigoDepartamento = clean($_POST['department']);
    $codigoProvincia = clean($_POST['province']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://portaladminusuarios.reniec.gob.pe/duplicado/servicios/getDistritosNacim.do',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"coDepartamento":"' . $codigoDepartamento . '","coProvincia":"' . $codigoProvincia  . '"}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $rptJson = json_decode($response);
    json_output(json_build(200, $rptJson, 'Se obtuvo Distritos'));
  }

  function add_studiesApplied_form()
  {
    try {
      // declaramos variables y almacenamos valores
      $centroEstudio = clean($_POST['centerEducational']);
      $nivelEstudio = clean($_POST['levelEducational']);
      $cursandoEstudio = clean($_POST['currentlyStudying']);
      $certificadoEstudio_name = clean($_POST['certificateEducational_name']);
      $desdeMes = $_POST['sinceMonth'];
      $desdeAnio = $_POST['sinceYear'];
      $hastaMes = $_POST['untilMonth'];
      $hastaAnio = $_POST['untilYear'];

      $desdeFecha = $desdeAnio . '-' . $desdeMes . '-01';
      $hastaFecha = $hastaAnio . '-' . $hastaMes . '-01';
      $desdeFecha_limpio = date("Y-m-d H:i:s", strtotime($desdeFecha));
      $hastaFecha_limpio = date("Y-m-d H:i:s", strtotime($hastaFecha));

      // Validar fechas
      if ($desdeFecha_limpio > $hastaFecha_limpio) {
        json_output(json_build(400, null, 'la fecha desde no puede ser mayor hasta'));
      }

      // Obtenemos nombre
      $nombreArchivo = $_FILES["certificateEducational_data"]["name"];
      // Obtenemos extension
      $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
      // Obtenemos fecha actual
      $fechaActual = date('d_m_Y');
      // Obtenemos correo
      $correoColaborador = $_SESSION['user_session_shouxin']['user']['email'];
      // Convertimos correo en texto amigable
      $correoLimpiado = preg_replace('/[\@\.\" "]+/', '_', $correoColaborador);
      // Renombrar archivo
      $nuevoNombre = sprintf("%s-%s-%s-certificado", $fechaActual, $nivelEstudio, $correoLimpiado);
      // Agrego extension
      $archivoOrginal = $nuevoNombre . '.' . $extension;
      // Mover del temporal al directorio actual
      move_uploaded_file($_FILES['certificateEducational_data']['tmp_name'], './assets/uploads/' . $archivoOrginal);
      // validamos extension
      if ($extension != 'pdf') {
        require('./assets/plugins/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('./assets/uploads/' . $archivoOrginal, 0, 0, 200, 300, $extension);
        $pdf->Output('./assets/uploads/' . $nuevoNombre . '.pdf', 'F');
      }

      if (!$colaborador = colaboradoresModel::colaborador_permitido($correoColaborador)) {
        json_output(json_build(400, null, 'No se encontro usuario, consulte al soporte'));
      }
      $colaborador_id = $colaborador['id_colaborador'];

      //if ($experienciaRealizados = estudiosrealizadosModel::get_experienciaRealizados($colaborador_id)) {
        /* $data =
          [
            'centroEducativo_estudioRealizado'              => $centroEstudio,
            'nivelEstudio_estudioRealizado'                 => $nivelEstudio,
            'cursandoActualmente_estudioRealizado'          => $cursandoEstudio,
            'nombreArchivoCertificado_estudiosRealizados'   => $nuevoNombre,
            'inicio_estudiosrealizados'                     => $desdeFecha_limpio,
            'final_estudiosrealizados'                      => $hastaFecha_limpio
          ];
        if (!$id = estudiosrealizadosModel::update(estudiosrealizadosModel::$t1, ['colaborador_id' => $colaborador_id], $data)) {
          json_output(json_build(400, null, 'Hubo un error al actualizar el temario.'));
        }
        // se guardó con éxito
        $estudiosRealizados = estudiosrealizadosModel::by_id($id);
        json_output(json_build(201, $estudiosRealizados, 'Estudio Realizado actualizado con éxito.')); */

      $data =
        [
          'colaborador_id'                                => $colaborador_id,
          'centroEducativo_estudioRealizado'              => $centroEstudio,
          'nivelEstudio_estudioRealizado'                 => $nivelEstudio,
          'cursandoActualmente_estudioRealizado'          => $cursandoEstudio,
          'nombreArchivoCertificado_estudiosRealizados'   => $nuevoNombre,
          'inicio_estudiosrealizados'                     => $desdeFecha_limpio,
          'final_estudiosrealizados'                      => $hastaFecha_limpio
        ];
      if (!$id = estudiosrealizadosModel::add(estudiosrealizadosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }
      $estudiosRealizados = estudiosrealizadosModel::by_id($id);
      // se guardó con éxito
      json_output(json_build(201, $estudiosRealizados, 'Estudio Realizado agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_studiesApplied()
  {
    try {

      $id   = clean($_SESSION['user_session_shouxin']['user']['id']);

      //$estudiosRealizados = estudiosrealizadosModel::by_id($id);
      $data = get_module('lista_studiesApplied', estudiosrealizadosModel::all_paginated($id));
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }
}
