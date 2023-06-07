<?php
session_start();

require_once 'utils/functions.php';
require_once 'config/config.php';

if (!isset($_SESSION['acceso_autorizado']) || $_SESSION['acceso_autorizado'] !== true) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>exito</title>
  <link href="styles/exito_style.css" rel="stylesheet" type="text/css">
</head>

<body>

  <div class="container-body">
    <p>¡Te has registrado correctamente!</p>
    <?php

    $conn = conectarDB();

    $sql = "SELECT * FROM usuarios_formulario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<h2>Datos registrados</h2>";
      echo "<div class=buttons><button class='mostrar-button' onclick='mostrarTabla()'>Mostrar Tabla</button>";
      echo "<button class='ocultar-button' onclick='ocultarTabla()'>Ocultar Tabla</button></div>";
      echo "<br/>";
      echo "<table id='tabla' style='display: none;'>";
      echo "<tr><th>Nombre</th><th>Primer apellido</th><th>Segundo apellido</th><th>Email</th><th>Login</th><th>Contraseña</th></tr></div>";

      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["NOMBRE"] . "</td>";
        echo "<td>" . $row["APELLIDO1"] . "</td>";
        echo "<td>" . $row["APELLIDO2"] . "</td>";
        echo "<td>" . $row["EMAIL"] . "</td>";
        echo "<td>" . $row["LOGIN"] . "</td>";
        echo "<td>" . $row["CONTRASEÑA"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";

    } else {
      echo "<p>No se encontraron datos registrados.</p>";
    }

    cerrarConexion($conn);
    ?>

    <br>

    <a href="index.php">Volver al formulario</a>

    <script src="scripts/exito_script.js"></script>

  </div>
</body>

</html>