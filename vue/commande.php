<?php
// Assuming you've started the session before this point
include_once '../model/function.php';
require "../auth.php";


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);

if (!empty($_GET["id"])) {
    $article = getCommande($_GET["id"]);
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
        <div class="overview-boxes">
            <div class="box">
                <!-- Article Form -->
                <form class="form" action="<?= !empty($_GET["id"]) ? "../model/modifCommande.php" :  "../model/ajoutCommande.php" ?>" method="post">
                    <!-- Your form inputs go here (as per your original code) -->

                    <input value="<?= !empty($_GET["id"]) ?  $article["id"] : "" ?>" type="hidden" name="id" id="id" />

                    <label for="id_article">Article</label>
                    <select onchange="setPrix()" name="id_article" id="id_article">
                        <?php
                        $articles = getArticle();
                        if (!empty($articles) && is_array($articles)) {
                            foreach ($articles as $key => $value) {
                        ?>
                                <option data-prix="<?= $value["prix_unitaire"] ?>" value="<?= $value["id"] ?>"><?= $value["nom_article"] . " - " . $value["quantite"] . " disponible" ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                    <label for="id_fournisseur">Fournisseur</label>
                    <select name="id_fournisseur" id="id_fournisseur">
                        <?php
                        $fours = getFour();
                        if (!empty($fours) && is_array($fours)) {
                            foreach ($fours as $key => $value) {
                        ?>
                                <option value="<?= $value["id"] ?>"><?= $value["nom"] . "  " . $value["prenom"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                    <label for="quantite">Quantité</label>

                    <input onkeyup="setPrix()" value="<?= !empty($_GET["id"]) ?  $article["quantite"] : "" ?>" type="text" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité" />

                    <label for="prix">Prix</label>
                    <input value="<?= !empty($_GET["id"]) ?  $article["prix"] : "" ?>" type="number" name="prix" id="prix" placeholder="Veuillez saisir le prix" />

                    <button type="submit">Valider</button>
                    <!-- Display Alert -->
                    <?php if (!empty($messageText)) : ?>
                        <div class='alert <?php echo $messageType; ?>'>
                            <?php echo $messageText; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
            <div class="box box2">

                <table class="mtable">
                    <tr>
                        <th>Article</th>
                        <th>Fournisseur </th>
                        <th>Quantite </th>
                        <th>Prix</th>
                        <th>Date </th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $commande = getCommande();
                    if (!empty($commande) && is_array($commande)) {
                        foreach ($commande as $key => $value) {
                    ?>
                            <tr>
                                <td><?= $value["nom_article"] ?></td>
                                <td><?= $value["nom"] . " " . $value["prenom"] ?></td>
                                <td><?= $value["quantite"] ?></td>
                                <td><?= $value["prix"] ?> DH</td>
                                <td><?= date('d/m/Y H:i:s', strtotime($value["date_commande"])) ?></td>
                                <td>
                                    <a href="recuCommande.php?id=<?= $value["id"] ?>"><i class='bx bx-receipt'></i></a>
                                    <!-- <a onclick="annulerCommande(<?= $value['id'] ?> , <?= $value['idArticle']?> , <?= $value['quantite'] ?> )" style="color:red"><i class='bx bx-stop-circle'></i></a> -->
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>


        </div>
    </div>

    </section>

    <?php include "pied.php" ?>
    <!-- </body>
</html> -->

    <script>
        // function annulerVente(idCommande, idArticle, quantite) {
        //     if (confirm("Voulez-vous vraiment annuler cette commande ?")) {
        //         window.location.href = '../model/annulerVente.php?idVente=' + idVente + '&idArticle=' + idArticle + '&quantite=' + quantite;
        //     }
        // }

        function setPrix() {
            var article = document.querySelector('#id_article');
            var quantite = document.querySelector('#quantite');
            var prix = document.querySelector("#prix");

            var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

            prix.value = Number(quantite.value) * Number(prixUnitaire);
        }
    </script>