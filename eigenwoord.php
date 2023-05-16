<?php

session_start();

if (isset($_POST["own"])) {
    $_SESSION["woord"] = $_POST["galgje"];
    header('Location: spel.php');
}

?>