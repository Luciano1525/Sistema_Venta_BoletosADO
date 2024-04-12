<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $asiento = $_POST['asiento'];

    try {
        // Preparar la consulta SQL para eliminar la venta basada en el número de asiento
        $stmt = $pdo->prepare("DELETE FROM venta WHERE asiento = ?");
        // Ejecutar la consulta con el número de asiento proporcionado
        $stmt->execute([$asiento]);

        // Si llegamos aquí, significa que la eliminación fue exitosa
        $response = ['success' => true, 'message' => '¡Venta eliminada correctamente!'];
    } catch(PDOException $e) {
        // En caso de error, enviar un mensaje de error
        $response = ['success' => false, 'message' => 'Error al eliminar la venta: ' . $e->getMessage()];
    }

    // Devolver la respuesta al cliente (en formato JSON)
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
