
<?php require('layouts/header.php');  ?>
    <?php require('functions/create.func.php');  ?>
    <h1>Ajouter un étudiant</h1>
   
        <?php
        if (isset($message)) {
           echo $message;
        }
        ?>
    
    <form action="" method="post">
        <input type="text" name="nom_etudiant" placeholder="nom"><br>
        <input type="text" name="prenom_etudiant" placeholder="prenom"><br>
        <input type="date" name="date_naissance"><br>
        <select name="id_promotion" id="">
            <?php foreach ($promotions as $promotion) {
            ?>
                <option value="<?= $promotion->id_promotion ?>"><?= $promotion->nom_promotion ?></option>
            <?php
            } ?>

            <option value="2">G2</option>
        </select>
        <input type="submit" name="submit" id="">
    </form>