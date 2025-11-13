<?php

declare(strict_types=1);

require_once __DIR__ . '/students.php';

$message = null;
$studentId = (int) ($_GET['id_etudiant'] ?? 0);

if ($studentId <= 0) {
    header('Location: read.php');
    exit;
}

$student = getStudentById($studentId);

if (!$student) {
    $_SESSION['flash_error'] = "L'étudiant demandé est introuvable.";
    header('Location: read.php');
    exit;
}

$promotions = getPromotions();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim(filter_input(INPUT_POST, 'nom_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $prenom = trim(filter_input(INPUT_POST, 'prenom_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $matricule = trim(filter_input(INPUT_POST, 'matricule_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $dateNaissance = trim(filter_input(INPUT_POST, 'date_naissance') ?? '');
    $idPromotion = (int) (filter_input(INPUT_POST, 'id_promotion', FILTER_VALIDATE_INT) ?? 0);

    if ($nom && $prenom && $matricule && $dateNaissance && $idPromotion > 0) {
        $updated = updateStudent($studentId, $nom, $prenom, $idPromotion, $matricule, $dateNaissance);

        if ($updated) {
            $_SESSION['flash_success'] = "La fiche étudiant a été mise à jour.";
            header('Location: readSingle.php?id_etudiant=' . $studentId);
            exit;
        }

        $message = "Impossible de mettre à jour l'étudiant. Veuillez réessayer.";
    } else {
        $message = "Tous les champs doivent être remplis correctement.";
    }

    $student = array_merge($student, [
        'nom_etudiant' => $nom,
        'prenom_etudiant' => $prenom,
        'matricule_etudiant' => $matricule,
        'date_naissance_etudiant' => $dateNaissance,
        'id_promotion' => $idPromotion,
    ]);
}
