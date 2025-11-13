<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbhost = 'localhost';
$dbname = 'campus_manager';
$dbuser = 'root';
$dbpassword = '';

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $dbhost, $dbname);
    $db = new PDO($dsn, $dbuser, $dbpassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    die("Erreur de connexion à la base de données. Veuillez vérifier la configuration.");
}
