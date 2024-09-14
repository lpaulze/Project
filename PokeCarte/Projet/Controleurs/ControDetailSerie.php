
<?php

include_once "./Models/ModSerie.php";
include_once "./Models/ModCarte.php";

// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID et s'assurer que c'est un entier
    $id = (int)$_GET['id'];
$uneSerie = getSerieParId($id);
$lesCartes = getLesCartesParIdSerie($id);}

include_once "./Views/Front/Entete.php";
include("./Views/Front/Serie.php");
include("./Views/Front/EnPied.php");

?>
