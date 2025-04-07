<?php
// require('db.php');

if (isset($_POST['submit'])) { // Teste si les formulaire est soumis 

    $nom = htmlspecialchars(trim($_POST['nom_etudiant']));
    $prenom = htmlspecialchars(trim($_POST['prenom_etudiant']));
    $id_promotion = intval($_POST['id_promotion']);
    $matricule = 1;
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));

    if (!empty($nom) && !empty($prenom) && !empty($date_naissance)) {

        createEtudiant($nom, $prenom, $id_promotion, $matricule, $date_naissance);
        
        $message = "<h2 style='color: green'>L'étudiant crée avec succéss</h2>";

    } else {
        $message = "<h2 style='color: red'>Tous les champs ne sont pas remplis</h2>";
    } 
}
// Cette fonction permet l'insertion d'un post dans la BDD
function  createEtudiant($nom, $prenom, $id_promotion, $matricule, $date_naissance)
{

    global $db;
    $sql = "INSERT INTO etudiant(nom_etudiant, prenom_etudiant, id_promotion, matricule_etudiant, date_naissance_etudiant, created) 
            VALUES(:nom_etudiant, :prenom_etudiant, :id_promotion, :matricule_etudiant, :date_naissance_etudiant,  NOW())";
    $req = $db->prepare($sql);
    $c = ([
        'nom_etudiant'               => $nom,
        'prenom_etudiant'            => $prenom,
        'id_promotion'               => $id_promotion,
        'matricule_etudiant'         => $matricule,
        'date_naissance_etudiant'    => $date_naissance
    ]);

    $response = $req->execute($c);
    if ($response) {

        header("Location: read.php");

    } 
   
}

// Categories
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

// 1.Compteur des etudiants
function Compteur_etudiant()
{

    global $db;

    $sql = "SELECT id_promotion FROM promotion";
    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount();

    return $exist;
}

$Compteur_etudiants = Compteur_etudiant();
