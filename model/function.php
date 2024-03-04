<?php
include "connexion.php";
function getArticle()
{
    $sql = "SELECT * FROM article";
    $req = $GLOBALS["connexion"]->prepare($sql);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
