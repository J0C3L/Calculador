<?php
session_start();
include("conexion.php");

$id_cliente = $_SESSION['id_cliente'];
$peso = $_POST['peso'];
$estatura = $_POST['estatura'];

$imc = $peso / ($estatura * $estatura);

// Guardar en historial
$sql = "INSERT INTO historial_imc (id_cliente, peso, estatura, imc)
        VALUES ('$id_cliente', '$peso', '$estatura', '$imc')";
$conn->query($sql);

// Clasificación IMC
if ($imc < 18.5) {
    $dieta = "Dieta alta en proteínas y carbohidratos.";
} elseif ($imc < 24.9) {
    $dieta = "Mantén una dieta balanceada.";
} elseif ($imc < 29.9) {
    $dieta = "Reduce azúcares y grasas, aumenta verduras.";
} else {
    $dieta = "Consulta nutricionista. Dieta baja en calorías.";
}

// Rutina por edad y género
$edad_sql = "SELECT edad, genero, condiciones FROM clientes WHERE id_cliente='$id_cliente'";
$res = $conn->query($edad_sql)->fetch_assoc();
$edad = $res['edad'];
$genero = $res['genero'];
$condiciones = $res['condiciones'];

if ($edad < 30) {
    $rutina = ($genero == 'M') ? "Rutina intensa de fuerza." : "Rutina de cardio + tonificación.";
} elseif ($edad < 50) {
    $rutina = "Rutina moderada: pesas ligeras + caminata.";
} else {
    $rutina = "Ejercicios suaves: yoga, pilates, caminatas.";
}

if (!empty($condiciones)) {
    $rutina .= " (Atención especial a condición: $condiciones)";
}
?>
<h2>Resultado IMC</h2>
<p>Tu IMC es: <?php echo round($imc, 2); ?></p>
<p><b>Sugerencia de dieta:</b> <?php echo $dieta; ?></p>
<p><b>Rutina recomendada:</b> <?php echo $rutina; ?></p>
<a href="index.php">Volver</a> | <a href="historial.php">Ver historial</a>
