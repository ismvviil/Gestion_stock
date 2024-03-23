<?php
// Assuming you've started the session before this point
include_once '../model/function.php';
require "../auth.php";


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);

if (!empty($_GET["id"])) {
    $commande = getCommande($_GET["id"]);
}else{
    header("Location: commande.php");
}

?>
<!-- <?php include 'entete.php' ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <link rel="stylesheet" href="../public/css/style.css" />
</head>

<body>
    <div class="home-content">

        <button class="hidden-print" id="btnPrint" style="position: relative; left:45%;cursor:pointer;"><i class='bx bx-printer'></i> Imprimer</button>

        <div class="page">
            <div class="cote-a-cote">
                <h2>KASOUFI Stock</h2>
                <div>
                    <p>Reçu N° #: <?= $commande["id"] ?></p>
                    <p>Date : <?= date('d/m/Y H:i:s', strtotime($commande["date_commande"])) ?></p>
                </div>
            </div>
            <div class="cote-a-cote" style="width:  50%;">
                <p>Nom Fournisseur :</p>
                <p><?= $commande["nom"] . " " . $commande["prenom"] ?></p>
            </div>
            <div class="cote-a-cote" style="width:  40%;">
                <p>Tel :</p>
                <p><?= $commande["telephone"] ?></p>
            </div>
            <div class="cote-a-cote" style="width:  40%;">
                <p>Adresse :</p>
                <p><?= $commande["adresse"] ?></p>
            </div>
            <br>
            <br>

            <table class="mtable">
                <tr>
                    <th>Designation</th>
                    <th>Quantite </th>
                    <th>Prix unitaire</th>
                    <th>Prix total </th>
                </tr>

                <tr>
                    <td><?= $commande["nom_article"] ?></td>
                    <td><?= $commande["quantite"] ?></td>
                    <td><?= $commande["prix_unitaire"] ?> DH</td>
                    <td><?= $commande["prix"] ?> DH</td>

                </tr>

            </table>
        </div>

    </div>

    </section>

    <?php include "pied.php" ?>
    <!-- </body>
</html> -->

    <script>
        btnPrint = document.getElementById("btnPrint");
        btnPrint.addEventListener('click', () => {
            window.print();
        });

        function setPrix() {
            var article = document.querySelector('#id_article');
            var quantite = document.querySelector('#quantite');
            var prix = document.querySelector("#prix");

            var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

            prix.value = Number(quantite.value) * Number(prixUnitaire);
        }
    </script>