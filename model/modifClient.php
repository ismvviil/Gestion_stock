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
    $sql = "UPDATE client SET nom = ? ,prenom = ? ,  telephone = ? ,
    adresse = ? WHERE id = ?";

    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse'],
        $_POST["id"]
    ));


    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Client modifié avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien a été modifie !";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée ?";
    $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/client.php');
