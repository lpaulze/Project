
<?php
include "GetRacine.php";
include "./Controleurs/MainContro.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "defaut";
}

session_start();

$fichier = mainControler($action);
include "$racine/Controleurs/$fichier";
?>
