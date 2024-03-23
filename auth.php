<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../authentification.php?err=4");
}
