<?php

session_start();
$woordenLijst = array("fiets","ladder","leeuw","aantal");

if (isset($_POST["random"])) {
    $index = array_rand($woordenLijst);
    $_SESSION["woord"] = $woordenLijst[$index];
    header('Location: spel.php');
}

?>