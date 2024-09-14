
<?php

    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__)
    $racine = ".";

    include_once "./Models/ModPDO.php";
    include_once "./Classes/ClassBloc.php";

function getBlocs()
{
    $lesBlocs = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from bloc");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $unBloc = new Bloc($ligne["id"], $ligne["nom"]);
            $lesBlocs[] = $unBloc;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $lesBlocs;
}

function getBlocParId($id)
{
    $lesBlocs = array();
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from bloc where id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $unBloc = new Bloc($ligne["id"], $ligne["nom"]);
    }

    catch (PDOException $e)
    {
        print "Erreur ! :" . $e->getMessage();
        die();
    }

    return $unBloc;
}

function addBloc($unBloc)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Insert Into Bloc (nom) Values(:nom,)");
        $req->bindValue(':nom', $unBloc->__get("nom"), PDO::PARAM_STR);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function majBloc($nouvBloc)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Update Bloc Set nom = :nom, Where id = :id");
        $req->bindValue(':nom', $nouvBloc->__get("nom"), PDO::PARAM_STR);
        $req->bindValue(':id', $nouvBloc->__get("id"), PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delBloc($unBloc)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Delete From Bloc Where id = :id");
        $req->bindValue(':id', $unBloc, PDO::PARAM_INT);

        $req->execute();
    }

    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
