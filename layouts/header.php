<?php

declare(strict_types=1);

require_once __DIR__ . '/../functions/db.php';

$flashSuccess = $_SESSION['flash_success'] ?? null;
$flashError = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$isAuthenticated = isset($_SESSION['id_user']);
$currentUserName = $isAuthenticated ? trim(($_SESSION['nom_user'] ?? '') . ' ' . ($_SESSION['prenom_user'] ?? '')) : null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95'
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-5A8mJdN96CB2A+qsSVqS+8CA0nVddOZXS6jttuPAHyBs+K6TfGsDz3jHK5vVsQt1zAr72Xd1Lgzf3LSeNnMV2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-slate-950 text-slate-100">
    <div class="min-h-screen flex flex-col">
        <header class="backdrop-blur bg-slate-950/70 border-b border-slate-800/70">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between gap-4">
                <a href="index.php" class="flex items-center gap-3 text-brand-300 hover:text-brand-200 transition-colors">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-brand-600 shadow-lg shadow-brand-900/40">
                        <i class="fa-solid fa-graduation-cap text-xl"></i>
                    </span>
                    <div>
                        <p class="font-semibold text-lg tracking-wide">Campus Manager</p>
                        <p class="text-xs text-slate-400 uppercase">Gestion académique simple</p>
                    </div>
                </a>
                <nav class="flex items-center gap-3">
                    <?php if ($isAuthenticated): ?>
                        <a href="create.php" class="btn btn-sm btn-ghost text-slate-100 hover:text-brand-200">Créer</a>
                        <a href="read.php" class="btn btn-sm btn-ghost text-slate-100 hover:text-brand-200">Étudiants</a>
                        <span class="hidden sm:inline-flex items-center gap-2 rounded-full bg-brand-600/20 px-3 py-1 text-sm text-brand-200">
                            <i class="fa-regular fa-circle-user"></i>
                            <?= htmlspecialchars($currentUserName ?: 'Utilisateur', ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                        <a href="disconect.php" class="btn btn-sm btn-error bg-rose-500 border-rose-500 hover:bg-rose-600 hover:border-rose-600 text-white">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i>Déconnexion
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-sm btn-ghost text-slate-100 hover:text-brand-200">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Connexion
                        </a>
                        <a href="register.php" class="btn btn-sm btn-primary bg-brand-600 border-brand-600 hover:bg-brand-500">S'inscrire</a>
                    <?php endif; ?>
                </nav>
            </div>
        </header>

        <?php if ($flashSuccess || $flashError): ?>
            <section class="container mx-auto px-4 pt-4">
                <?php if ($flashSuccess): ?>
                    <div class="alert alert-success shadow-lg shadow-emerald-900/30 border border-emerald-500/30">
                        <i class="fa-solid fa-circle-check"></i>
                        <span><?= htmlspecialchars($flashSuccess, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($flashError): ?>
                    <div class="alert alert-error mt-3 shadow-lg shadow-rose-900/30 border border-rose-500/30">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span><?= htmlspecialchars($flashError, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <main class="flex-1 container mx-auto px-4 py-10">