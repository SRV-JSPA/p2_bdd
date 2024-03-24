
<?php

require "includes/database.php"; 
require 'includes/funciones.php';

$db = conectarBD();

$errores = [];
if($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $_POST["USER"];
    $password = $_POST["password"];


    $errores = [];
    if(!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    if(!$password) {
        $errores[] = "El Password es obligatorio";
    }

    if(empty($errores)) {
        $sql = "SELECT * FROM usuarios WHERE user = :user";
        $statement = $db->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);


        if($usuario && password_verify($password, $usuario["password"])) {

            session_start();
            $_SESSION["usuario"] = $usuario["email"];
            $_SESSION["login"] = true;
            header("Location: /pages");
            exit; 
        } else {
            $errores[] = "Credenciales incorrectas";
        }
    }
}


// Incluye el header

incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php
        foreach($errores as $error){ ?>
            <div class="alerta error" >
                <?php echo "".$error.""; ?>
            </div>
           
        <?php } ?>

        <form class="formulario" method="POST" >
        <fieldset>
                <legend>Usuario y Contraseña</legend>

                <label for="user">Usuario</label>
                <input type="text" name="user" placeholder="Tu Usuario" id="user" >

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password" >
            </fieldset>
            
            <input type="submit" value="Iniciar Sesión" class="boton-verde" >
            <input type="submit" value="Registrarse" class="boton-gris" >
    </main>

<?php
        
        incluirTemplate("footer");
?>  

