<!DOCTYPE html>
<html lang="<?php echo SITE_LANG; ?>">

<head>
  <!-- Agregar basepath para definir a partir de donde se deben generar los enlaces y la carga de archivos -->
  <base href="<?php echo BASEPATH; ?>">

  <meta charset="UTF-8">
  <?php if ($d->title == 'Login') : ?>
    <meta name="google-signin-client_id" content="963222250164-d6kmckaqbia3nqpijf10eo3a5sfs36l7.apps.googleusercontent.com">
  <?php else : ?>
  <?php endif; ?>

  <title><?php echo isset($d->title) ? $d->title . ' - ' . get_sitename() : 'Bienvenido - ' . get_sitename(); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- inc_styles.php -->
  <?php require_once INCLUDES . 'inc_styles.php'; ?>
</head>

<body class="<?php echo isset($d->bg) && $d->bg === 'dark' ? 'bg-dark' : 'bg-light' ?>" style="<?php echo 'padding: ' . (isset($d->padding) ? $d->padding : '200px 0px'); ?>">
  <!-- ends inc_header.php -->