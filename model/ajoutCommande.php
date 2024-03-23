<?php
include "connexion.php";
include_once "function.php";
require "../auth.php";

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }


if (
    !empty($_POST['id_article'])
    && !empty($_POST['id_fournisseur'])
    && is_numeric($_POST['quantite'])  // Check if it's a valid number
    && !empty($_POST['prix'])
) {

    $sql = "INSERT INTO commande(id_article, id_fournisseur, quantite, prix)
        VALUES (?, ?, ?, ?)";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['id_article'],
        $_POST['id_fournisseur'],
        intval($_POST['quantite']),
        $_POST['prix'],
    ));

    if ($req->rowCount() != 0) {
        $sql = "UPDATE article SET quantite = quantite + ? WHERE id = ?;";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            intval($_POST['quantite']),
            $_POST['id_article'],
        ));

        if ($req->rowCount() != 0) {
            $_SESSION['message']['text'] = "Commande effectué avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Impossible de faire cette commande !";
            $_SESSION['message']['type'] = "danger";
        }
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de la commande";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/commande.php');
