<?php

function mainControler($action) {
    $actions = array();
    $actions["defaut"]      = "ControSerie.php";
    $actions["accueil"]     = "ControSerie.php";
    $actions["detailSerie"]     = "ControDetailSerie.php";
    $actions["detailCarte"]     = "ControDetailCarte.php";
    $actions["SerieBack"]     = "ControSerieBack.php";
    $actions["SerieMaj"]     = "ControSerieBack.php";
    $actions["AddSerie"]     = "ControSerieBack.php";
    $actions["DelSerie"]     = "ControSerieBack.php";

    if (array_key_exists($action, $actions)) {
        return $actions[$action];
    } 
    else {
        return $actions["defaut"];
    }
}

?>