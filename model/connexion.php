<?php
// session_start();
$nom_server = "localhost";
$nom_bd = "gestion_stock";
$utilsateur = "root";
$pass = "5967";
try {
    $connexion = new PDO("mysql:host=$nom_server;dbname=$nom_bd", $utilsateur, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connexion reussie";
    return $connexion;
} catch (Exception $e) {
    die("Erreur de connexion:" . $e->getMessage());
}
