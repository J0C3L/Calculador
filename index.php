<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/Estilos.css">
    <title>Calculadora PHP </title>

    <?php
    session_start();
    if (!isset($_SESSION['id_cliente'])) {
        header("Location: login.php");
    exit();
}
?>
</head>
<body>
    <header>
        <div class="logo"></div>
        <p>Calculadora para IMS</p>
        <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
    </header>
    <section class="formcalcu">
        <h3>Ingresa tu informacion</h3>
        <form method="POST" action="calcular.php"><br>
            Peso (kg): <input type="number" step="0.1" name="peso" required><br><br>
            Estatura (m): <input type="number" step="0.01" name="estatura" required><br><br>
            <button type="submit">Calcular IMC</button><br>
        </form>
        <a href="historial.php">Ver historial</a><br>   
        <a href="logout.php">Cerrar sesión</a>
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

