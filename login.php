<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/Estilos.css">
    <title>Login </title>


<?php
    session_start();
    include("conexion.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM clientes WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['id_cliente'] = $row['id_cliente'];
            $_SESSION['nombre'] = $row['nombre'];
            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
    }
?>
</head>
<body>
    <header>
        <p>Calculadora para IMS</p>
    </header>

    <section class="cuadrologin">
        <p>Bienvenido</p>
        <form method="POST">
            <p>Usuario:</p>
            <input type="text" name="usuario" required><br>
            <p>Contraseña:</p> 
            <input type="password" name="contrasena" required><br>
            <button type="submit">Ingresar</button>
        </form>
        <a href="registro.php">Registrarse</a>
    </section>

    <footer>
        <ul>
            <li><p>Calculadora inteligente para el cuidado del cuerpo</p></li>
            <li><p>Hecho por: Cristofheer Ceballos & Jose David Garcia</p></li>
            <li><p>Proyecto de aula usando validacion y verificacion</p></li>
        </ul>
    </footer>
</body>
</html>



