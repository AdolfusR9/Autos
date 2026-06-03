<?php
$conexion = mysqli_connect("localhost", "root", "", "preorden") or die("Problemas con la conexión");

// Utilizando consultas preparadas
$query = "INSERT INTO ordenes (vehiculo, nombre, apellidos, correo, telefono, nombretarjeta, numetarjeta, mes_expiracion, ano_expiracion, CVV, CP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);

mysqli_stmt_bind_param(
    $stmt,
    "sssssssiiss",
    $_REQUEST['vehiculo'],
    $_REQUEST['nombre'],
    $_REQUEST['apellidos'],
    $_REQUEST['correo'],
    $_REQUEST['telefono'],
    $_REQUEST['nombretarj'],
    $_REQUEST['numetarjeta'],
    $_REQUEST['mes_expiracion'],
    $_REQUEST['ano_expiracion'],
    $_REQUEST['CVV'],
    $_REQUEST['CP']
);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: index.html");
  exit;
} else {
    echo "Error en la inserción: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
