<?php
// Assuming you've started the session before this point
include_once '../model/function.php';


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);
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
                <form action="../model/ajoutArticle.php" method="post">
                    <!-- Your form inputs go here (as per your original code) -->
                    <label for="nom_article">Nom de l'article</label>
                    <input type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom" />

                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Choisissez une catégorie</option>
                        <option value="Ordinateur">Ordinateur</option>
                        <option value="Imprimante">Imprimante</option>
                        <option value="Accessoire">Accessoire</option>
                    </select>

                    <label for="quantite">Quantité</label>
                    <input type="text" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité" />

                    <label for="prix_unitaire">Prix unitaire</label>
                    <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix" />

                    <label for="date_fabrication">Date fabrication</label>
                    <input type="datetime-local" name="date_fabrication" id="date_fabrication" />

                    <label for="date_expiration">Date d'expiration</label>
                    <input type="datetime-local" name="date_expiration" id="date_expiration" />

                    <button type="submit">Valider</button>
                    <!-- Display Alert -->
                    <?php if (!empty($messageText)) : ?>
                        <div class='alert <?php echo $messageType; ?>'>
                            <?php echo $messageText; ?>
                        </div>
                    <?php endif; ?>
                </form>
                <div class="box">

                    <table class="mtable">
                        <tr>
                            <th>Nom articlec</th>
                            <th>Catégorie </th>
                            <th>Quantite </th>
                            <th>Prix unitairec</th>
                            <th>Date fabrication</th>
                            <th>Date expirations</th>
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
                                    <td><?= $value["date_fabrication"] ?></td>
                                    <td><?= $value["date_expiration"] ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </table>
                </div>


            </div>
        </div>

        <!-- Article Listing (if applicable) -->
        <div class=" sales-boxes">
            <div class="recent-sales">
                <h2 class="title">Recent Articles</h2>
                <!-- Display your articles here, you can fetch them from the database -->
                <ul class="sales-details">
                    <li><a href="#">Article 1</a></li>
                    <li><a href="#">Article 2</a></li>
                    <!-- Add more articles as needed -->
                </ul>
            </div>

            <!-- Additional Content (if needed) -->
            <div class="top-sales">
                <h2 class="title">Top Articles</h2>
                <!-- Display top articles or additional content here -->
            </div>
        </div>
    </div>

    <!-- <?php include "pied.php" ?> -->
</body>

</html>