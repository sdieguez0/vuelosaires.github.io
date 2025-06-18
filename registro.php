<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

include "conexion.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userNombre = $_POST["userName"];

    $userEmail = $_POST["userEmail"];

    $userPassword = $_POST["userPassword"];



    // Verificar si el email ya existe

    $checkEmail = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email_usuario='$userEmail'");

    if (mysqli_num_rows($checkEmail) > 0) {

        echo '❌ Este correo ya existe';

        exit();

    }



    // Verificar si el nombre de usuario ya existe

    $checkUsername = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$userNombre'");

    if (mysqli_num_rows($checkUsername) > 0) {

        echo '❌ Este nombre de usuario ya existe';

        exit();

    }



    // Insertar usuario nuevo

    $query = "INSERT INTO usuarios(nombre_usuario, email_usuario, contraseña_usuario)

              VALUES('$userNombre', '$userEmail', '$userPassword')";



    $run = mysqli_query($conexion, $query);



    if ($run) {

        echo '✔ Te registraste correctamente';

    } else {

        echo '❌ Error al registrar: ' . mysqli_error($conexion);

    }

}

?>