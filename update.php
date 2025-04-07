<?php
    require('layouts/header.php'); 
    include('functions/update.func.php'); ?>
      <form action="" method="post">
        <input type="text" name="nom_etudiant" placeholder="nom" value="<?= $etudiant->nom_etudiant ?>"><br>
        <input type="text" name="prenom_etudiant" placeholder="prenom" value="<?= $etudiant->prenom_etudiant ?>"><br>
        <input type="date" name="date_naissance" value="<?= $etudiant->date_naissance_etudiant ?>"><br>
        <select name="id_promotion" id="">
            <?php foreach ($promotions as $promotion) {     
            ?>
                <option value="<?= $promotion->id_promotion ?>"><?= $promotion->nom_promotion ?></option>
            <?php
            
            } ?>   
        </select>
        <input type="submit" name="submit" id="">
    </form>
    <?php
  
    
   
    ?>
   