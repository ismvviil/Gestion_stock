<?php
include "connexion.php";
require "../auth.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ...

if (
    !empty($_POST['libelle_categorie'])

) {
    $sql = "UPDATE categorie_article SET libelle_categorie = ? WHERE id = ?";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['libelle_categorie'],
        $_POST['id']
    ));


    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Categorie modifié avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien a été modifie !";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/categorie.php');
