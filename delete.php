<?php

declare(strict_types=1);

require_once __DIR__ . '/functions/students.php';

if (!isset($_SESSION['id_role']) || (int) $_SESSION['id_role'] !== 1) {
    $_SESSION['flash_error'] = "Action non autorisée.";
    header('Location: read.php');
    exit;
}

$studentId = (int) ($_GET['id_etudiant'] ?? 0);

if ($studentId <= 0) {
    $_SESSION['flash_error'] = "Identifiant étudiant invalide.";
    header('Location: read.php');
    exit;
}

if (deleteStudent($studentId)) {
    $_SESSION['flash_success'] = "L'étudiant a été supprimé.";
} else {
    $_SESSION['flash_error'] = "Impossible de supprimer cet étudiant.";
}

header('Location: read.php');
exit;
