<?php require('layouts/header.php');  ?>
<?php require('functions/register.func.php');  ?>

<?php
        if (isset($message)) {
           echo $message;
        }
        ?>
<form action="" method="POST">
    <input type="text" name="nom_user" placeholder="nom"><br>
    <input type="text" name="prenom_user" placeholder="prenom"><br>
    <input type="text" name="email_user" placeholder="address mail"><br>
    <input type="password" name="motpass_user" placeholder="mot de passe"><br>
    <input type="password" name="motpass_repeat" placeholder="confirmer votre mot de passe"><br>
    <input type="submit" name="submit" id="">
</form>



