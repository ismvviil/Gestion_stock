<?php
// session_start();
require "../auth.php";
include_once "../model/function.php";

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    // echo $login;
} else {
    $login = "Inkonnu";
    // echo $login;
};
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title><?php echo  ucfirst(str_replace(".php", "", basename($_SERVER["PHP_SELF"])));
            ?></title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="sidebar hidden-print">
        <div class="logo-details">
            <img src="../public/img/kangustock-favicon-black.png" alt="">
            <span class="logo_name">KASOUFI</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="vente.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'vente.php' ? 'active' : '' ?>">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links_name">Vente</span>
                </a>
            </li>
            <li>
                <a href="client.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'client.php' ? 'active' : '' ?>">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Client</span>
                </a>
            </li>

            <li>
                <a href="article.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'article.php' ? 'active' : '' ?>">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Article</span>
                </a>
            </li>
            <li>
                <a href="fournisseur.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'fournisseur.php' ? 'active' : '' ?>">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Fournisseur</span>
                </a>
            </li>
            <li>
                <a href="commande.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'commande.php' ? 'active' : '' ?>">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Commandes</span>
                </a>
            </li>
            <li>
                <a href="categorie.php" class=".nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'categorie.php' ? 'active' : '' ?>">
                    <i class='bx bx-category'></i>
                    <span class="links_name">Catégorie</span>
                </a>
            </li>

            <li class="log_out">
                <a href="../deconnexion.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav class="hidden-print nav-top">
            <div class="sidebar-button">
                <!-- <i class="bx bx-menu sidebarBtn"></i> -->
                <span class="dashboard" style="margin-left: 100px;"><?php echo  ucfirst(str_replace(".php", "", basename($_SERVER["PHP_SELF"])));
                                                                    ?></span>
            </div>
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name"><?php echo $login ?></span>
                <!-- <i class="bx bx-chevron-down"></i> -->
            </div>
        </nav>