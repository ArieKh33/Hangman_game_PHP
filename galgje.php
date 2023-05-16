<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje spel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Galgje<h1>
    <h2>Kies je gamemode<h2>

<div class="random_woord">
    <form action="randomwoord.php" method="POST">
    <input type="submit" value="Willekeurig woord" name="random"></input><br>
    </form>
</div>

<div class="eigen_woord">
    <form action="eigenwoord.php" method="POST">
    <input type="text" name="galgje">
    <input type="submit" value="Eigen woord" name="own"></input><br>
    </form>
</div>

</body>
</html>