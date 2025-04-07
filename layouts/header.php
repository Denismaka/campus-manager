<?php require('functions/db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="navigation">
           
            <?php
                if (isset($_GET['id_user'])) {
                ?>
                 <li><a href="create.php?id_user=<?= $_SESSION['id_user']  ?>">create</a></li>
                 <li><a href="read.php?id_user=<?= $_SESSION['id_user']  ?>">read</a></li>
                <li><?php echo $_SESSION['nom_user'] ?> <?php echo $_SESSION['prenom_user']  ?></li>
                <li><a href="disconect.php">Deconnexion </a></li>

                <?php
                } else {
                 ?>
                    <li><a href="login.php">connexion</a></li>
                    <li><a href="register.php">Enregistrement</a></li>
                <?php

                }
            ?>
        </ul>
    </nav>
</body>
</html>
