
<?php

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__)
    $racine = ".";

    include_once "./Models/ModPDO.php";
    include_once "./Classes/ClassCarte.php";

function getCartes()
{
    $lesSeries = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from carte");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $uneCarte = new Carte($ligne["id"], $ligne["nom"], $ligne["numero"], $ligne["image"], $ligne["rarete"], $ligne["idSerie"]);
            $lesCartes[] = $uneCarte;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesCartes;
}

function getLesCartesParIdSerie($idSerie)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Select C.id, C.nom, C.numero, C.image, C.rarete, C.idSerie From Carte C inner Join Serie S on S.id = C.idSerie where C.idSerie = :idSerie order by C.numero");
        $req->bindValue(':idSerie', $idSerie, PDO::PARAM_INT);
        
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $uneCarte = new Carte($ligne["id"], $ligne["nom"], $ligne["numero"], $ligne["image"], $ligne["rarete"], $ligne["idSerie"]);
            $lesCartes[] = $uneCarte;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesCartes;
}

function getCarteParId($id)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Select * From Carte where id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $uneCarte = new Carte($ligne["id"], $ligne["nom"], $ligne["numero"], $ligne["image"], $ligne["rarete"], $ligne["idSerie"]);
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $uneCarte;
}

function addCarte($uneCarte)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Insert Into Carte (nom, numero, image, rarete,idSerie) Values(:nom, :numero, :image, :rarete, :idSerie)");
        $req->bindValue(':nom', $uneCarte->__get("nom"), PDO::PARAM_STR);
        $req->bindValue(':numero', $uneCarte->__get("numero"), PDO::PARAM_STR);
        $req->bindValue(':image', $uneCarte->__get("image"), PDO::PARAM_STR);
        $req->bindValue(':rarete', $uneCarte->__get("rarete"), PDO::PARAM_STR);
        $req->bindValue(':idSerie', $uneCarte->__get("idSerie"), PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function majCarte($nouvCarte)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Update Carte Set nom = :nom, numero = :numero , image = :image , rarete = :rarete , idSerie = :idSerie ,Where id = :id");
        $req->bindValue(':nom', $nouvCarte->__get("nom"), PDO::PARAM_STR);
        $req->bindValue(':numero', $nouvCarte->__get("numero"), PDO::PARAM_STR);
        $req->bindValue(':image', $nouvCarte->__get("image"), PDO::PARAM_STR);
        $req->bindValue(':rarete', $nouvCarte->__get("rarete"), PDO::PARAM_STR);
        $req->bindValue(':idSerie', $nouvCarte->__get("idSerie"), PDO::PARAM_INT);
        $req->bindValue(':id', $nouvCarte->__get("id"), PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delCarte($uneCarte)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Delete From Carte Where id = :id");
        $req->bindValue(':id', $uneCarte, PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
