<?php

declare(strict_types=1);

session_start();
$_SESSION = [];
session_destroy();

session_start();
$_SESSION['flash_success'] = 'Vous êtes déconnecté. À bientôt !';

header('Location: index.php');
exit;
