<?php
// Assuming you've started the session before this point
include_once '../model/function.php';
require "../auth.php";


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);

if (!empty($_GET["id"])) {
    $categorie = getCategorie($_GET["id"]);
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
                <form class="form" action="<?= !empty($_GET["id"]) ? "../model/modifCategorie.php" :  "../model/ajoutCategorie.php" ?>" method="post">
                    <!-- Your form inputs go here (as per your original code) -->
                    <label for="libelle_categorie">Libelle catégorie</label>

                    <input value="<?= !empty($_GET["id"]) ?  $categorie["libelle_categorie"] : "" ?>" type="text" name="libelle_categorie" id="libelle_categorie" placeholder="Veuillez saisir le nom" />
                    <input value="<?= !empty($_GET["id"]) ?  $categorie["id"] : "" ?>" type="hidden" name="id" id="id" />


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
                        <th>Libelle</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $categorie = getCategorie();
                    if (!empty($categorie) && is_array($categorie)) {
                        foreach ($categorie as $key => $value) {
                    ?>
                            <tr>
                                <td><?= $value["libelle_categorie"] ?></td>
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