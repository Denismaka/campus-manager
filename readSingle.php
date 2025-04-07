<?php
    require('layouts/header.php'); 
    require('functions/viewSingle.func.php');

 

?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>readSingle</title>
    </head>
    <body>
        <style>
            .readSingle .container .row .left img {
                width: 40%;
            }
            .readSingle .container .row {
                display: flex;
                margin-left: 100px;
            }
        </style>
        <div class="readSingle">
            <div class="container">
                <div class="row">
                    <div class="left">
                        <img src="/assets/images/dmk.jpg" alt="">
                    </div>
                    <div class="right">
                        <h4>1. Nom: <?= $etudiant->nom_etudiant ?></h4>
                        <h4>2. Prenom: <?= $etudiant->prenom_etudiant ?></h4>
                        <h4>3. date_naissance: <?= $etudiant->date_naissance_etudiant ?></h4>
                        <h4>4. Matricule: <?= $etudiant->matricule_etudiant ?></h4>
                        <h4>4. Promotion: <?= $etudiant->id_promotion ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>