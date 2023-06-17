<?php

function conectarDB()
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function cerrarConexion($conn)
{
    $conn->close();
}

function camposRellenados($nombre, $apellido1, $apellido2, $email, $login, $pass)
{
    if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($login) || empty($pass)) {
        return false;
    }
    return true;
}

function validarNombre($nombre)
{
    $maxCaracteres = 30;

    if (strlen($nombre) > $maxCaracteres) {
        echo "<script>alert('El nombre no puede tener más de 30 caracteres.'); location.href = 'index.php';</script>";
        exit;
    }

    return preg_match('/^[A-Za-z]+$/', $nombre);
}
function validarApellidos($apellido1, $apellido2)
{
    $maxCaracteres = 30;

    if (strlen($apellido1) > $maxCaracteres || strlen($apellido2) > $maxCaracteres) {
        echo "<script>alert('Los apellidos no pueden tener más de 30 caracteres.'); location.href = 'index.php';</script>";
        exit;
    }

    return preg_match('/^[A-Za-záéíóúÁÉÍÓÚüÜ]+$/', $apellido1) && preg_match('/^[A-Za-záéíóúÁÉÍÓÚüÜ]+$/', $apellido2);
}

function validarEmail($email)
{
    $maxCaracteres = 255;

    if (strlen($email) > $maxCaracteres) {
        echo "<script>alert('El email no puede tener más de 255 caracteres.'); location.href = 'index.php';</script>";
        exit;
    }

    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarLogin($login)
{
    $maxCaracteres = 10;

    if (strlen($login) > $maxCaracteres) {
        echo "<script>alert('El login no puede tener más de 10 caracteres.'); location.href = 'index.php';</script>";
        exit;
    }

    return !empty($login);
}

function validarContraseña($pass)
{
    return (strlen($pass) >= 4 && strlen($pass) <= 8) && preg_match('/.*/', $pass);
}

function verificarEmailExistente($conn, $email)
{
    $sqlVerificar = "SELECT * FROM usuarios_formulario WHERE email='$email'";
    $result = $conn->query($sqlVerificar);

    if ($result->num_rows > 0) {
        return true;
    }

    return false;
}

function verificarLoginExistente($conn, $login)
{
    $sqlVerificarLogin = "SELECT * FROM usuarios_formulario WHERE log_in='$login'";
    $result = $conn->query($sqlVerificarLogin);

    if ($result->num_rows > 0) {
        return true;
    }

    return false;
}

function insertarUsuario($conn, $nombre, $apellido1, $apellido2, $email, $login, $pass)
{
    $sqlInsertar = "INSERT INTO usuarios_formulario (NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, EMAIL, LOG_IN, CONTRASEÑA) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$pass')";

    return $conn->query($sqlInsertar);

}
?>
