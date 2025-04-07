<?php include('layouts/header.php');  ?>
<?php include('functions/login.func.php');  ?>
    
    <?php
        if (isset($message)) {
           echo $message;
        }
        ?>

    <form action="" method="POST">
        <input type="email" name="email_user" placeholder="Address_email" required><br>
        <input type="password" name="motpass_user" placeholder="Mot_de_passe" required><br>
        <input type="submit" name="submit" id="submit" value="soumettre">
    </form>