<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['login'])) {
        header("Location: authentification.php?err=2");
        exit();
    }
    if (empty($_POST['password'])) {
        header("Location: authentification.php?err=3");
        exit();
    }
    $host = "localhost";
    $dbname = "gestion_stock";
    $user = "root";
    $password = "5967";
    try {
        $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM admin WHERE login=? AND pass=?");
        $login = $_POST["login"];
        $pass = $_POST["password"];
        $sql->execute([$login, $pass]);
        $data = $sql->fetch();
        if (empty($data)) {
            header("Location: authentification.php?err=1");
        } else {
            session_start();
            $_SESSION['login'] = $data["login"];
            header('Location: vue/dashboard.php');
        }
    } catch (PDOException $e) {
        die("ERRor" . $e->getMessage());
    }
} else {
    header('Location: authentification.php');
}
