<?php
const HOST = "localhost:3307";
const USER = "root";
const PASS = "1525";
const DB = "ventaboletos";
const CHARSET = "utf8mb4"; // Cambiar a utf8mb4

try {
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=".CHARSET, USER, PASS);
    // Configura el modo de error PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
