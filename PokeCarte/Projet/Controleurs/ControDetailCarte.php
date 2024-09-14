
<?php

include_once "./Models/ModCarte.php";

// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID et s'assurer que c'est un entier
    $id = (int)$_GET['id'];
$uneCarte = getCarteParId($id);}

include_once "./Views/Front/Entete.php";
include("./Views/Front/Carte.php");
include("./Views/Front/EnPied.php");

?>
