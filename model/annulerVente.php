<?php
include "connexion.php";
require "../auth.php";

if (!empty($_GET["idVente"]) && !empty($_GET["idArticle"]) && !empty($_GET["quantite"])) {
    $sql = "UPDATE vente SET etat = ? WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        0,
        $_GET["idVente"]
    ]);

    if ($stmt->rowCount() != 0) {
        $sql = "UPDATE article set quantite = quantite + ?  WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            $_GET["quantite"],
            $_GET["idArticle"]
        ]);
    }
}

header("Location: ../vue/vente.php");
