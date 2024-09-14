
<?php

include_once "./Models/ModSerie.php";
include_once "./Models/ModBloc.php";

$lesSeries = getSeries();
$lesSeriesFr = getSeriesFr();
$lesSeriesJap = getSeriesJap();
$lesBlocs = getBlocs();

if ($_GET["action"] == "SerieMaj") {
// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID et s'assurer que c'est un entier
    $id = (int)$_GET['id'];
    $uneSerie = getSerieParId($id);
    
    $uneSerieIdBloc = $uneSerie->__get('idBloc');
    $unNomBloc = getBlocParId($uneSerieIdBloc);
    
    // Vérifier si le formulaire est soumis avec toutes les données requises
    if (isset($_POST['nom'], $_POST['idBloc'], $_POST['langue'])) {
        $nom = $_POST['nom'];
        $idBloc = $_POST['idBloc'];
        $langue = $_POST['langue'];

        // Gestion des fichiers images (logo et stamp)
        $image = !empty($_FILES['image']['name']) ? './Image/Logos/' . basename($_FILES['image']['name']) : $uneSerie->__get('image');
        $stamp = !empty($_FILES['stamp']['name']) ? './Image/Stamps/' . basename($_FILES['stamp']['name']) : $uneSerie->__get('stamp');

        // Déplacement des fichiers uploadés vers le dossier cible
        if (!empty($_FILES['image']['tmp_name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }

        if (!empty($_FILES['stamp']['tmp_name'])) {
            move_uploaded_file($_FILES['stamp']['tmp_name'], $stamp);
        }

        try {
            $nouvSerie = new Serie($id, $nom, $image, $stamp, $idBloc, $langue);
            majSerie($nouvSerie);
            echo '<script>location.replace("../Projet/?action=SerieBack");</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
}


if ($_GET["action"] == "AddSerie") {
// Initialiser un tableau pour les erreurs
$erreurs = [];

// Vérifier si le formulaire est soumis avec toutes les données requises
if (isset($_POST['nom'], $_POST['idBloc'], $_POST['langue'])) {
    // Récupération des valeurs du formulaire
    $nom = trim($_POST['nom']); // trim() pour supprimer les espaces inutiles
    $idBloc = trim($_POST['idBloc']);
    $langue = trim($_POST['langue']);
    
    // Vérifier si les champs sont vides et ajouter un message d'erreur si c'est le cas
    if (empty($nom)) {
        $erreurs[] = "Le nom de la série ne peut pas être vide.</br>";
    }
    if (empty($idBloc)) {
        $erreurs[] = "Veuillez sélectionner un bloc.</br>";
    }
    if (empty($langue)) {
        $erreurs[] = "La langue ne peut pas être vide.</br>";
    }

       // Gestion des images pour le logo
    if (!empty($_FILES['image']['name'])) {
        $image = './Image/Logos/' . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            $erreurs[] = "Erreur lors du téléchargement du logo.</br>";
        }
    } else {
        // Vérifier si une image précédente existe, sinon mettre une valeur par défaut
        if (isset($uneSerie)) {
            $image = $uneSerie->__get('image');
        } else {
            $image = '';
        }
        if (empty($image)) {
            $erreurs[] = "Le logo de la série ne peut pas être vide.</br>";
        }
    }

    // Gestion des images pour le stamp
    if (!empty($_FILES['stamp']['name'])) {
        $stamp = './Image/Stamps/' . basename($_FILES['stamp']['name']);
        if (!move_uploaded_file($_FILES['stamp']['tmp_name'], $stamp)) {
            $erreurs[] = "Erreur lors du téléchargement du stamp.</br>";
        }
    } else {
        // Vérifier si un stamp précédent existe, sinon mettre une valeur par défaut
        if (isset($uneSerie)) {
            $image = $uneSerie->__get('stamp');
        } else {
            $image = '';
        }
        if (empty($stamp)) {
            $erreurs[] = "Le stamp de la série ne peut pas être vide.</br>";
        }
    }

    // Si aucune erreur n'est détectée, créer la nouvelle série
    if (empty($erreurs)) {
        try {
            $nouvSerie = new Serie($id, $nom, $image, $stamp, $idBloc, $langue);
            addSerie($nouvSerie);
            echo '<script>location.replace("../Projet/?action=SerieBack");</script>';
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } 
}
}

if ($_GET["action"] == "DelSerie"){
// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID et s'assurer que c'est un entier
    $id = (int)$_GET['id'];
    delSerie($id);
    echo '<script>location.replace("../Projet/?action=SerieBack");</script>';
}
}

include_once "./Views/Front/Entete.php";
include_once "./Views/Back/MajAddSerie.php";
include_once "./Views/Back/Serie.php";
include_once "./Views/Front/EnPied.php";

?>
