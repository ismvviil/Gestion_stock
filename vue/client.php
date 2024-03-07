<?php
// Assuming you've started the session before this point
include_once '../model/function.php';


// Check for session messages and reset them
$messageText = isset($_SESSION['message']['text']) ? $_SESSION['message']['text'] : '';
$messageType = isset($_SESSION['message']['type']) ? $_SESSION['message']['type'] : '';
unset($_SESSION['message']);

if (!empty($_GET["id"])) {
    $client = getClient($_GET["id"]);
}
?>

<!-- <?php include 'entete.php' ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Page</title>
    <link rel="stylesheet" href="../public/css/style.css" />
</head>

<body>
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <!-- Client Form -->
                <form class="form" action="<?= !empty($_GET["id"]) ? "../model/modifClient.php" :  "../model/ajoutClient.php" ?>" method="post">
                    <!-- Your form inputs go here (as per your original code) -->
                    <label for="nom">Nom</label>
                    <input value="<?= !empty($_GET["id"]) ?  $client["nom"] : "" ?>" type="text" name="nom" id="nom" placeholder="Veuillez saisir le nom" />
                    <input value="<?= !empty($_GET["id"]) ?  $client["id"] : "" ?>" type="hidden" name="id" id="id" />

                    <label for="prenom">Prenom</label>
                    <input value="<?= !empty($_GET["id"]) ?  $client["prenom"] : "" ?>" type="text" name="prenom" id="prenom" placeholder="Veuillez saisir le prenom" />


                    <label for="telephone">N° de téléphone</label>
                    <input value="<?= !empty($_GET["id"]) ?  $client["telephone"] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le N° de téléphone" />

                    <label for="adresse">Adresse</label>
                    <input value="<?= !empty($_GET["id"]) ?  $client["adresse"] : "" ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse" />

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
                        <th>Nom </th>
                        <th>Prénom </th>
                        <th>Téléphone </th>
                        <th>adresse</th>
                    </tr>
                    <?php
                    $clients = getClient();
                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                    ?>
                            <tr>
                                <td><?= $value["nom"] ?></td>
                                <td><?= $value["prenom"] ?></td>
                                <td><?= $value["telephone"] ?></td>
                                <td><?= $value["adresse"] ?></td>
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