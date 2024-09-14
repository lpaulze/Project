
<?php

include_once "./Models/ModSerie.php";

$lesSeries = getSeries();
$lesSeriesFr = getSeriesFr();
$lesSeriesJap = getSeriesJap();

include_once "./Views/Front/Entete.php";
include_once "./Views/Front/Accueil.php";
include_once "./Views/Front/EnPied.php";

?>
