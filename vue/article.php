<!-- <?php include 'entete.php' ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/style.css" />
</head>

<body>
    <div class="home-content">
        <div class="overvirw-boxes">
            <div class="box">
                <form action="../model/ajoutArticle.php" method="post">
                    <label for="nom_article">Nom de l'article</label>
                    <input type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom" />
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Choisi une catégorie</option>
                        <option value="Ordinateur">Ordinateur</option>
                        <option value="Imprimant">Imprimant</option>
                        <option value="Accessoire">Accessoire</option>
                    </select>
                    <label for="quantite">Quantité</label>
                    <input type="text" name="quantite" id="quantite" placeholder="Veuillez saisir la quantite" />

                    <label for="prix_unitaire">Prix unitaire</label>
                    <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix" />

                    <label for="date_fabrication">Date fabrication</label>
                    <input type="datetime-local" name="date_fabrication" id="date_fabrication" />

                    <label for="date_expiration">Date d'expiration</label>
                    <input type="datetime-local" name="date_expiration" id="date_expiration" />

                    <button type="submit">Valider</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- </section> -->

<!-- <?php
        include "pied.php" ?> -->