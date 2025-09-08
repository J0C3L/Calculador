<?php
session_start();
include("conexion.php");

$id_cliente = $_SESSION['id_cliente'];
$sql = "SELECT * FROM historial_imc WHERE id_cliente='$id_cliente' ORDER BY fecha DESC";
$result = $conn->query($sql);
?>
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
