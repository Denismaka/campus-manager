<?php

declare(strict_types=1);

require_once __DIR__ . '/students.php';

$promotions = getPromotions();
$studentCount = getStudentCount();
$message = null;
$formData = [
    'nom' => '',
    'prenom' => '',
    'matricule' => '',
    'date_naissance' => '',
    'id_promotion' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim(filter_input(INPUT_POST, 'nom_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $prenom = trim(filter_input(INPUT_POST, 'prenom_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $matricule = trim(filter_input(INPUT_POST, 'matricule_etudiant', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $dateNaissance = trim(filter_input(INPUT_POST, 'date_naissance') ?? '');
    $idPromotion = (int) (filter_input(INPUT_POST, 'id_promotion', FILTER_VALIDATE_INT) ?? 0);

    $formData = [
        'nom' => $nom,
        'prenom' => $prenom,
        'matricule' => $matricule,
        'date_naissance' => $dateNaissance,
        'id_promotion' => $idPromotion,
    ];

    if ($nom && $prenom && $matricule && $dateNaissance && $idPromotion > 0) {
        $created = createStudent($nom, $prenom, $idPromotion, $matricule, $dateNaissance);

        if ($created) {
            $_SESSION['flash_success'] = "L'étudiant a été créé avec succès.";
            header('Location: read.php');
            exit;
        }

        $message = "Une erreur est survenue, veuillez réessayer.";
    } else {
        $message = "Tous les champs doivent être remplis correctement.";
    }
}
