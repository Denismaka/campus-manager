<?php
// require('db.php');

if (isset($_POST['submit'])) {

    $nom = htmlspecialchars(trim($_POST['nom_etudiant']));
    $prenom = htmlspecialchars(trim($_POST['prenom_etudiant']));
    $id_promotion = intval($_POST['id_promotion']);
    $matricule = 1;
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));
    $getId = $_GET['id_etudiant'];

    if (!empty($nom) && !empty($prenom) && !empty($date_naissance)) {

        updateEtudiant($nom, $prenom, $id_promotion, $matricule, $date_naissance, $getId);
    } else {
        echo "Tous les champs ne sont pas remplis";
    }
}

// Cette fonction permet l'insertion d'un post dans la BDD
function  updateEtudiant($nom, $prenom, $id_promotion, $matricule, $date_naissance, $getId)
{

    global $db;
    $c = ([
        'nom_etudiant'               => $nom,
        'prenom_etudiant'            => $prenom,
        'id_promotion'               => $id_promotion,
        'matricule_etudiant'         => $matricule,
        'date_naissance_etudiant'    => $date_naissance,
        'id_etudiant'                => $getId
    ]);
    $sql = "UPDATE etudiant SET nom_etudiant =:nom_etudiant, prenom_etudiant =:prenom_etudiant,  id_promotion=:id_promotion, matricule_etudiant=:matricule_etudiant, date_naissance_etudiant=:date_naissance_etudiant, created=NOW() WHERE id_etudiant = :id_etudiant";
    $req = $db->prepare($sql);

   $response = $req->execute($c); 
    if ($response) {

        header("Location: read.php");
    }

}
function etudiantSingle()
{
    global $db;$sql = "SELECT * FROM etudiant JOIN promotion ON etudiant.id_promotion = promotion.id_promotion WHERE etudiant.id_etudiant='{$_GET['id_etudiant']}'";
    $req = $db->query($sql);

    $result = $req->fetchObject();
    return $result;
}




$etudiant = etudiantSingle();


function get_promotion()
{
    global $db;


    // Avec une triple jointure
    $req = $db->query("SELECT * FROM promotion  ORDER BY id_promotion DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$promotions = get_promotion();


?>