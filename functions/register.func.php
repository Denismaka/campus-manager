<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim(filter_input(INPUT_POST, 'nom_user', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $prenom = trim(filter_input(INPUT_POST, 'prenom_user', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
    $email = trim(strtolower(filter_input(INPUT_POST, 'email_user', FILTER_VALIDATE_EMAIL) ?? ''));
    $password = filter_input(INPUT_POST, 'motpass_user') ?? '';
    $passwordConfirmation = filter_input(INPUT_POST, 'motpass_repeat') ?? '';

    if ($nom && $prenom && $email && $password && $passwordConfirmation) {
        if (strlen($password) < 8) {
            $message = "Le mot de passe doit contenir au minimum 8 caractères.";
        } elseif ($password !== $passwordConfirmation) {
            $message = "Les mots de passe ne correspondent pas.";
        } elseif (emailExists($email)) {
            $message = "Cette adresse email est déjà utilisée.";
        } else {
            $created = createUser($nom, $prenom, $email, $password);

            if ($created) {
                $_SESSION['flash_success'] = 'Compte créé avec succès. Vous pouvez vous connecter.';
                header('Location: login.php');
                exit;
            }

            $message = "Impossible de créer votre compte pour le moment.";
        }
    } else {
        $message = "Merci de remplir tous les champs du formulaire.";
    }
}

function emailExists(string $email): bool
{
    global $db;

    $statement = $db->prepare('SELECT 1 FROM users WHERE email_user = :email LIMIT 1');
    $statement->execute(['email' => $email]);

    return (bool) $statement->fetchColumn();
}

function createUser(string $nom, string $prenom, string $email, string $password): bool
{
    global $db;

    $statement = $db->prepare('INSERT INTO users (nom_user, prenom_user, email_user, motpass_user, cle_user, token_user, created, id_role)
        VALUES (:nom, :prenom, :email, :password, :cle, :token, NOW(), :role)');

    return $statement->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'cle' => generateNumericKey(15),
        'token' => bin2hex(random_bytes(16)),
        'role' => 3,
    ]);
}

function generateNumericKey(int $length): string
{
    $key = '';

    for ($i = 0; $i < $length; $i++) {
        $key .= random_int(0, 9);
    }

    return $key;
}
