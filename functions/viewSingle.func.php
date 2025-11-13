<?php

declare(strict_types=1);

require_once __DIR__ . '/students.php';

$studentId = (int) ($_GET['id_etudiant'] ?? 0);

if ($studentId <= 0) {
    header('Location: read.php');
    exit;
}

$etudiant = getStudentById($studentId);

if (!$etudiant) {
    $_SESSION['flash_error'] = "L'étudiant demandé est introuvable.";
    header('Location: read.php');
    exit;
}
