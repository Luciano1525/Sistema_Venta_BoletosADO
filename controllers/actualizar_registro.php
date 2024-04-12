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
    // Preparar la consulta SQL para actualizar el registro en la base de datos
    $stmt = $pdo->prepare("UPDATE venta SET nombre = ?, apellidos = ?, destino = ?, origen = ?, precio = ? WHERE asiento = ?");
    
    // Ejecutar la consulta para actualizar el registro en la base de datos
    $stmt->execute([$nombre, $apellidos, $destino, $origen, $precio, $asiento]);

    // Si llegamos aquí, significa que la actualización fue exitosa
    $response = ['success' => true, 'message' => '¡Registro actualizado exitosamente!'];
} catch(PDOException $e) {
    // En caso de error, enviar un mensaje de error
    $response = ['success' => false, 'message' => 'Error al actualizar el registro: ' . $e->getMessage()];
}

// Devolver la respuesta al cliente (en formato JSON)
header('Content-Type: application/json');
echo json_encode($response);
?>
