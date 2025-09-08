<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $condiciones = $_POST['condiciones'];

    $sql = "INSERT INTO clientes (usuario, contrasena, nombre, edad, genero, condiciones)
            VALUES ('$usuario', '$contrasena', '$nombre', '$edad', '$genero', '$condiciones')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    Nombre: <input type="text" name="nombre"><br>
    Edad: <input type="number" name="edad"><br>
    Género: 
    <select name="genero">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    Condiciones físicas: <input type="text" name="condiciones"><br>
    <button type="submit">Registrarse</button>
</form>
