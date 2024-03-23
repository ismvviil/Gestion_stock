<?php include 'entete.php' ?> <div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Commande</div>
                <div class="number"><?php echo getAllCommande()['nbre'] ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <!-- <i class="bx bx-cart-alt cart"></i> -->
            <i class="fa fa-cart-plus" style="font-size:36px; color:lightgreen"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Vente</div>
                <div class="number"><?php echo getAllVente()['nbre'] ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <!-- <i class="bx bxs-cart-add cart two"></i> -->
            <i class="fa fa-cart-arrow-down" style="font-size:36px ; color:lightblue"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Nombre Article</div>
                <div class="number"><?php echo getAllArticle()['nbre'] ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bx-store-alt" style="font-size:40px ; margin-left:5px ; color:lightgreen"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Chiffre d'affaires</div>
                <div class="number"><?php echo number_format(getCA()['prix']) ?> DH</div>
                <div class="indicator">
                    <i class="bx bx-down-arrow-alt down"></i>
                    <span class="text">Aujourd'hui</span>
                </div>
            </div>
            <!-- <i class="bx bxs-cart-download cart four"></i> -->
            <i class="fa fa-line-chart" style="font-size:36px ; margin-left:5px ; color:lightblue"></i>
        </div>
    </div>

    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" style="text-align: center; font-size:30px;">Vente recentes</div>
            <?php
            $vente = getLastVente();
            ?>
            <div class="sales-details">
                <ul class="details">
                    <li class="topic">Date</li>
                    <?php

                    if (!empty($vente) && is_array($vente)) {
                        foreach ($vente as $key => $val) {
                            echo '<li><a href="#">' . date('d M Y', strtotime($val['date_vente'])) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="details">
                    <li class="topic">Client</li>
                    <?php
                    if (!empty($vente) && is_array($vente)) {
                        foreach ($vente as $key => $val) {
                            echo '<li><a href="#">' . $val['nom'] . " " . $val['prenom'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="details">
                    <li class="topic">Produit</li>
                    <?php
                    if (!empty($vente) && is_array($vente)) {
                        foreach ($vente as $key => $val) {
                            echo '<li><a href="#">' . $val['nom_article'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="details">
                    <li class="topic">Prix</li>
                    <?php
                    if (!empty($vente) && is_array($vente)) {
                        foreach ($vente as $key => $val) {
                            echo '<li><a href="#">' . number_format($val['prix'], 0, ',', " ")  . ' DH</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="button">
                <a href="vente.php">Voir Tout</a>
            </div>
        </div>
        <div class="top-sales box">
            <div class="title" style="text-align: center; font-size:30px;">Top Article</div>
            <?php
            $article = getTopArticle();
            ?>
            <ul class="top-sales-details">
                <?php
                foreach ($article as $key => $value) {
                    echo '<li>';
                    echo '<a href="#"><span class="product" > ' . $value["nom_article"] . '</span></a>';
                    echo '<span class="price" > ' .  number_format($value['prix'], 0, ',', " ") . ' DH</span>';
                    echo '</li>';
                }

                ?>
            </ul>
        </div>
    </div>
</div>
</section>
<?php include 'pied.php' ?>