<?php
session_start();
if (!isset($_SESSION['id_cliente'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
<form method="POST" action="calcular.php">
    Peso (kg): <input type="number" step="0.1" name="peso" required><br>
    Estatura (m): <input type="number" step="0.01" name="estatura" required><br>
    <button type="submit">Calcular IMC</button>
</form>
<a href="historial.php">Ver historial</a> | <a href="logout.php">Cerrar sesión</a>
