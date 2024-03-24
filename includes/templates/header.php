<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION["login"] ?? null;


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 2 BD</title>
    <link href="../../styles.css" rel="stylesheet">
    <link rel="preload" href="../../normalize.css">
</head>

<body>

    <header class="header <?php echo $inicio ? "inicio" : ''; ?>">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="#">
                    <h1 class="logo__nombre no-margin centrar-texto">Restaurante<span class="logo__bold">Asgard</span></h1>
                </a>

                <nav class="navegacion">
                    <a href="#">navegacion</a>
                    <?php if ($auth) : ?>
                        <a href="#">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <?php if ($inicio) { ?>
            <h1>Restaurante</h1>
        <?php } ?>
    </header>