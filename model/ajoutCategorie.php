<?php
include "connexion.php";
require "../auth.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (
    !empty($_POST['libelle_categorie'])
) {
    $sql = "INSERT INTO categorie_article(libelle_categorie)
        VALUES (?)";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['libelle_categorie'],

    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Categorie ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout d'une categorie";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/categorie.php');
