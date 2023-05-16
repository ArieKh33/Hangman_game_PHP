<?php

session_start();

echo "<h1>Galgje!!</h1>";

function maakInput()
{

    $usedLetters = '';

    if (isset($_POST['usedLetters'])) {
        $usedLetters = $_POST['usedLetters'] . $_POST['char'];
    }

    $alfabet = range("a", "z");
    echo '<form action="spel.php" method="POST">';
    echo '<input value="' . $usedLetters . '" hidden name="usedLetters">';
    foreach ($alfabet as $character) {
        if (str_contains($usedLetters, $character)) {
            echo "<input type='submit' name='char' disabled class='disabled' value='$character'>";
        } else {
            echo "<input type='submit' name='char' value='$character'>";
        }
    }
}

if (isset($_SESSION["fout"]) == false) {
    $_SESSION["fout"] = 1;
}
function getStatus()
{
    $alfabet = range("a", "z");
    $unset = $_SESSION['woord'];
    $counter = 0;

    if (isset($_SESSION["correctwoord"]) == false) {
        for ($countchar = 0; $countchar < strlen($unset); $countchar++) {
            $_SESSION["correctwoord"][$countchar] = "_";
        }
    }
    if (isset($_POST['char'])) {
        for ($teller = 0; $teller < strlen($unset); $teller++) { 
            if ($_POST['char'] == $unset[$teller]) {
                $_SESSION["correctwoord"][$teller] = $_POST['char'];
            } else {
                $counter += 1;
            }
        }
        if (strlen($unset) - $counter == 0) {
            $_SESSION["fout"]++; 
        }
    }
    foreach ($_SESSION["correctwoord"] as $value) {
        echo "<a>";
        echo $value;
        echo " ";
        echo "<a>";
    }
    $_SESSION["wincounter"] = 0;
    foreach ($_SESSION["correctwoord"] as $prot) {
        if ($prot === "_") {
            $_SESSION["wincounter"] += 1;
        }
    }
    if ($_SESSION["wincounter"] == 0) {
        echo '<h1>winner</h1>';
        $_SESSION["gameover"] = true;
    }
}
function Imgselectort()
{
    switch ($_SESSION["fout"]) {
        case 1:
            echo '<img src="begin.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 2:
            echo '<img src="1-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 3:
            echo '<img src="2-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 4:
            echo '<img src="3-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 5:
            echo '<img src="4-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 6:
            echo '<img src="5-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 7:
            echo '<img src="6-fout.png" alt="" class="imgs">' . PHP_EOL;
            break;
        case 8:
            echo '<h1>GAME OVER</h1>' . PHP_EOL;
            $_SESSION["gameover"] = true;
            echo 'the correct awnser was: ' . $_SESSION['woord'] . PHP_EOL;
            break;
    }
}
getStatus();
Imgselectort();
if (isset($_SESSION["gameover"]) == false) {
    maakInput();
}
echo '<form action="spel.php" method="POST">
<input type="submit" name="reset" value="Terug naar start pagina">
</form>';

if (isset($_POST["reset"])) {
    session_destroy();
    header('Location: galgje.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="onhandig.css">
    <title>galgje</title>
</head>
<body>
</body>
</html>