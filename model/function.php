<?php
include "connexion.php";
function getArticle($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT * FROM article WHERE id = ?";
        $req = $GLOBALS["connexion"]->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM article";
        $req = $GLOBALS["connexion"]->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

function getClient($id = null)
{
    if (!empty($id)) {
        $sql = "SELECT * FROM client WHERE id = ?";
        $req = $GLOBALS["connexion"]->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM client";
        $req = $GLOBALS["connexion"]->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}