<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo DOMAIN; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        <link href="<?php echo constant('RUTA'); ?>assets/css/normalize.css" rel="stylesheet">
        <link href="<?php echo constant('RUTA'); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo constant('RUTA'); ?>assets/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo constant('RUTA'); ?>assets/css/adminlte.min.css" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini bg-dark">
        
        <div class="wrapper">

        <?php include_once('views/app/nav.php'); ?>