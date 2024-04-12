<?php
include 'db_connection.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$destino = $_POST['destino'];
$origen = $_POST['origen'];
$precio = $_POST['precio'];
$asiento = $_POST['asiento'];

try {
    // Preparar la consulta SQL
    $stmt = $pdo->prepare("INSERT INTO venta (nombre, apellidos, destino, origen, precio, asiento) VALUES (?, ?, ?, ?, ?, ?)");
    // Ejecutar la consulta con los datos proporcionados
    $stmt->execute([$nombre, $apellidos, $destino, $origen, $precio, $asiento]);

    // Si llegamos aquí, significa que la inserción fue exitosa
    $respons = ['success' => true, 'message' => '¡Registro de boleto exitoso!'];
} catch(PDOException $e) {
    // En caso de error, enviar un mensaje de error
    $respons = ['success' => false, 'message' => 'Error al registrar el boleto: ' . $e->getMessage()];
}

// Devolver la respuesta al cliente (en formato JSON)
header('Content-Type: application/json');
echo json_encode($respons);
?>
