<?php
include "connexion.php";
require "../auth.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ...

if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
) {
    $sql = "INSERT INTO fournisseur(nom, prenom, telephone, adresse)
        VALUES (?, ?, ?, ?)";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse'],
    ));


    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Fournisseur ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du Fournisseur";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location: a../vue/fournisseur.php');
