
    <?php
        require('layouts/header.php');
        require('functions/read.func.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
         table {
            margin-top: 200px;
            margin-left: 300px;
            
        }
        table th, td {
            border: 1px solid #000;
            padding: 25px;
            color: white;
            background-color: #000;
            font-weight: 600;
            cursor: pointer;
        }
        table tbody a {
            text-decoration: none;
            text-transform: capitalize;
            font-size: 15px;
            color: white;
        }
    </style>
       <?php
        if (isset($message)) {
           echo $message;
        }
        ?>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Faculté</th>
            <th>Departement</th>
            <th>Date de naissance</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant) {
                ?>
                <tr>
                    <td><?= $etudiant->nom_etudiant ?></td>
                    <td><?= $etudiant->prenom_etudiant ?></td>
                    <td><?= $etudiant->faculte ?></td>
                    <td><?= $etudiant->departement ?></td>
                    <td><?= $etudiant->date_naissance_etudiant ?></td>
               
                    <td>
                        <a href="readSingle.php?id_etudiant=<?= $etudiant->id_etudiant ?>&id_user=<?= $_SESSION['id_user']  ?>">Vue |</a>
                        <?php 
                            if ($_SESSION['id_role'] == 1) {
                                ?>
                                 <a href="update.php?id_etudiant=<?= $etudiant->id_etudiant ?>&id_user=<?= $_SESSION['id_user']  ?>">Mise à jour |</a>
                                 <a href="delete.php?id_etudiant=<?= $etudiant->id_etudiant ?>&id_user=<?= $_SESSION['id_user']  ?>">Supprimer</a>
                                <?php 
                            }
                        ?>
                       
                    </td>
                </tr>
                <?php
            } ?>
            
        </tbody>
    </table>
</body>
</html>