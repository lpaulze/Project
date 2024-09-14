
<?php

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__)
    $racine = ".";

    include_once "./Models/ModPDO.php";
    include_once "./Classes/ClassSerie.php";

function getSeries()
{
    $lesSeries = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from serie");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $uneSerie = new Serie($ligne["id"], $ligne["nom"], $ligne["image"], $ligne["stamp"], $ligne["idBloc"], $ligne["langue"]);
            $lesSeries[] = $uneSerie;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesSeries;
}

function getSeriesFr()
{
    $lesSeriesFr = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from serie where langue = 'fr' ");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $uneSerie = new Serie($ligne["id"], $ligne["nom"], $ligne["image"], $ligne["stamp"], $ligne["idBloc"], $ligne["langue"]);
            $lesSeriesFr[] = $uneSerie;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesSeriesFr;
}

function getSeriesJap()
{
    $lesSeriesJap = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from serie where langue = 'jap' ");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $uneSerie = new Serie($ligne["id"], $ligne["nom"], $ligne["image"], $ligne["stamp"], $ligne["idBloc"], $ligne["langue"]);
            $lesSeriesJap[] = $uneSerie;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesSeriesJap;
}

function getSerieParId($id)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from serie where id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $uneSerie = new Serie($ligne["id"], $ligne["nom"], $ligne["image"], $ligne["stamp"], $ligne["idBloc"], $ligne["langue"]);

    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $uneSerie;
}

function addSerie($uneSerie)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Insert Into Serie (nom, image, stamp, idBloc,langue) Values(:nom, :image, :stamp, :idBloc, :langue)");
        $req->bindValue(':nom', $uneSerie->__get("nom"), PDO::PARAM_STR);
        $req->bindValue(':image', $uneSerie->__get("image"), PDO::PARAM_STR);
        $req->bindValue(':stamp', $uneSerie->__get("stamp"), PDO::PARAM_STR);
        $req->bindValue(':idBloc', $uneSerie->__get("idBloc"), PDO::PARAM_INT);
        $req->bindValue(':langue', $uneSerie->__get("langue"), PDO::PARAM_STR);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function majSerie($nouvSerie)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Update Serie Set nom = :nom, image = :image , stamp = :stamp , idBloc = :idBloc , langue = :langue Where id = :id");
        $req->bindValue(':nom', $nouvSerie->__get("nom"), PDO::PARAM_STR);
        $req->bindValue(':image', $nouvSerie->__get("image"), PDO::PARAM_STR);
        $req->bindValue(':stamp', $nouvSerie->__get("stamp"), PDO::PARAM_STR);
        $req->bindValue(':idBloc', $nouvSerie->__get("idBloc"), PDO::PARAM_INT);
        $req->bindValue(':langue', $nouvSerie->__get("langue"), PDO::PARAM_STR);
        $req->bindValue(':id', $nouvSerie->__get("id"), PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delSerie($id)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Delete From Serie Where id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
