<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(strtolower(filter_input(INPUT_POST, 'email_user', FILTER_VALIDATE_EMAIL) ?? ''));
    $password = trim(filter_input(INPUT_POST, 'motpass_user') ?? '');

    if ($email && $password) {
        $user = findUserByEmail($email);

        if ($user && password_verify($password, $user['motpass_user'])) {
            if (password_needs_rehash($user['motpass_user'], PASSWORD_DEFAULT)) {
                upgradeUserPasswordHash((int) $user['id_user'], $password);
                $user = findUserByEmail($email) ?: $user;
            }

            createUserSession($user);
            $_SESSION['flash_success'] = 'Connexion réussie. Bienvenue !';
            header('Location: create.php');
            exit;
        }

        $message = "Identifiants incorrects. Veuillez réessayer.";
    } else {
        $message = "Veuillez renseigner un email valide et un mot de passe.";
    }
}

function findUserByEmail(string $email): ?array
{
    global $db;

    $statement = $db->prepare('SELECT * FROM users WHERE email_user = :email LIMIT 1');
    $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    return $user ?: null;
}

function upgradeUserPasswordHash(int $userId, string $plainPassword): void
{
    global $db;

    $statement = $db->prepare('UPDATE users SET motpass_user = :hash WHERE id_user = :id');
    $statement->execute([
        'hash' => password_hash($plainPassword, PASSWORD_DEFAULT),
        'id' => $userId,
    ]);
}

function createUserSession(array $user): void
{
    $_SESSION['id_user'] = (int) $user['id_user'];
    $_SESSION['nom_user'] = $user['nom_user'];
    $_SESSION['prenom_user'] = $user['prenom_user'];
    $_SESSION['email_user'] = $user['email_user'];
    $_SESSION['id_role'] = (int) ($user['id_role'] ?? 3);
    $_SESSION['confirmation_user'] = $user['confirmation_user'] ?? null;
}
