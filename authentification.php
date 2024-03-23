<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-form">
        <h1>Login</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Log In</h2>
                    <form action="traitement_auth.php" method="post">
                        <input type="text" name="login" placeholder="User Name" id="login" autofocus="">
                        <input type="password" name="password" placeholder="User Name" id="pass" autofocus="">
                        <button class="btn" type="submit">
                            Login
                        </button>
                        <?php
                        if (isset($_GET["err"])) {
                            echo "<span class='error'>";
                            switch ($_GET['err']) {
                                case 1:
                                    echo "Login ou mot de pass incorrect !";
                                    break;
                                case 2:
                                    echo "Le champ login est obligatoire !";
                                    break;
                                case 3:
                                    echo "Le mot de pass est obligatoire !";
                                    break;
                                case 4:
                                    echo "Authentifiez-vous pour accedez a cette page !";
                                    break;
                            }
                            echo "<span>";
                        }

                        ?>
                    </form>
                </div>
                <div class="form-img">
                    <img src="stock.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

</body>

</html>