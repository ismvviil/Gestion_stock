<?php
include "connexion.php";
require "../auth.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ...

if (
    !empty($_POST['nom_article'])
    && !empty($_POST['id_categorie'])
    && is_numeric($_POST['quantite'])  // Check if it's a valid number
    && !empty($_POST['prix_unitaire'])
    && !empty($_POST['date_fabrication'])
    && !empty($_POST['date_expiration'])
) {
    $sql = "UPDATE article SET nom_article = ? ,id_categorie = ? ,  quantite = ? ,
    prix_unitaire = ? , date_fabrication = ? , date_expiration = ? WHERE id = ?";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom_article'],
        $_POST['id_categorie'],
        intval($_POST['quantite']),
        $_POST['prix_unitaire'],
        $_POST['date_fabrication'],
        $_POST['date_expiration'],
        $_POST['id']
    ));




    // ...


    // ...


    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Article modifié avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien a été modifie !";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/article.php');
