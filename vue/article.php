<?php
// Assuming you've started the session before this point
include_once '../model/function.php';


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);

if (!empty($_GET["id"])) {
    $article = getArticle($_GET["id"]);
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
                <form class="form" action="<?= !empty($_GET["id"]) ? "../model/modifArticle.php" :  "../model/ajoutArticle.php" ?>" method="post">
                    <!-- Your form inputs go here (as per your original code) -->
                    <label for="nom_article">Nom de l'article</label>
                   
                    <input value="<?= !empty($_GET["id"]) ?  $article["nom_article"] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom" />
                    <input value="<?= !empty($_GET["id"]) ?  $article["id"] : "" ?>" type="hidden" name="id" id="id"  />

                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Choisissez une catégorie</option>
                        <option <?= !empty($_GET["id"]) && $article["categorie"] == "Ordinateur" ?  "selected" : "" ?> value="Ordinateur">Ordinateur</option>
                        <option <?= !empty($_GET["id"]) && $article["categorie"] == "Imprimant" ?  "selected" : "" ?> value="Imprimante">Imprimante</option>
                        <option <?= !empty($_GET["id"]) && $article["categorie"] == "Accessoire" ?  "selected" : "" ?> value="Accessoire">Accessoire</option>
                        <option <?= !empty($_GET["id"]) && $article["categorie"] == "Téléphone" ?  "selected" : "" ?> value="Téléphone">Téléphone</option>
                    </select>

                    <label for="quantite">Quantité</label>
                    
                    <input value="<?= !empty($_GET["id"]) ?  $article["quantite"] : "" ?>" type="text" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité" />

                    <label for="prix_unitaire">Prix unitaire</label>
                    <input value="<?= !empty($_GET["id"]) ?  $article["prix_unitaire"] : "" ?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix" />

                    <label for="date_fabrication">Date fabrication</label>
                    <input value="<?= !empty($_GET["id"]) ?  $article["date_fabrication"] : "" ?>" type="datetime-local" name="date_fabrication" id="date_fabrication" />

                    <label for="date_expiration">Date d'expiration</label>
                    <input value="<?= !empty($_GET["id"]) ?  $article["date_expiration"] : "" ?>" type="datetime-local" name="date_expiration" id="date_expiration" />

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
                        <th>Nom articlec</th>
                        <th>Catégorie </th>
                        <th>Quantite </th>
                        <th>Prix unitaire</th>
                        <th>Date fabrication</th>
                        <th>Date expirations</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $articles = getArticle();
                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                    ?>
                            <tr>
                                <td><?= $value["nom_article"] ?></td>
                                <td><?= $value["categorie"] ?></td>
                                <td><?= $value["quantite"] ?></td>
                                <td><?= $value["prix_unitaire"] ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($value["date_fabrication"])) ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($value["date_expiration"])) ?></td>
                                <td><a href="?id=<?= $value["id"] ?>"><i class='bx bx-edit-alt'></i></a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>


        </div>
    </div>



    <!-- <?php include "pied.php" ?> -->
</body>

</html>