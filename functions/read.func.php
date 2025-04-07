<?php 
require('db.php');

function get_clients()
{
    global $db;
    $requetteJoin = "SELECT * FROM clients JOIN rendez_vous ON clients.id_rdv = rendez_vous.id_rdv ORDER BY id_clients DESC";
    $req =  $db->query($requetteJoin);
    $results = [];
    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }return $results;
}
$clients = get_clients();

// 1.Compteur des etudiants
function Compteur_clients()
{
    global $db;
    $sql = "SELECT id_clients FROM clients";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount();
    return $exist;
}
$Compteur_etudiants = Compteur_clients();
?>
