<?php
$host = 'localhost';
$db   = 'mi_proyecto';
$user = 'root'; // usuario por defecto de XAMPP
$pass = '';     // contraseña por defecto de XAMPP (vacía)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
