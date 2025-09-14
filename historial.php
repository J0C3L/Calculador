<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hisotrial de Pesos</title>
    <link rel="stylesheet" href="Estilos/Estilos.css">

    <?php
    session_start();
        include("conexion.php");

        $id_cliente = $_SESSION['id_cliente'];
        $sql = "SELECT * FROM historial_imc WHERE id_cliente='$id_cliente' ORDER BY fecha DESC";
        $result = $conn->query($sql);
    ?>
</head>
<body>

    <header>
        <div class="logo"></div>
        <p>Calculadora para IMS</p>
        <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>
    </header>
    <section class="tablahistorial">

            <h2>Historial de IMC</h2>
        <table border="1">
            <tr><th>Peso</th><th>Estatura</th><th>IMC</th><th>Fecha</th></tr>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['peso']; ?></td>
                    <td><?php echo $row['estatura']; ?></td>
                    <td><?php echo $row['imc']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <a href="index.php">Volver</a>
        
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



