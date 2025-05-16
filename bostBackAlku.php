 <!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Laku Toimitus</title>
</head>
<body>

<h2>Laku Toimituslomake</h2>

<form method="post" action="">
    Nimi: <input type="text" name="nimi" required><br><br>
    Osoite: <input type="text" name="osoite" required><br><br>
    Määrä (kpl): <input type="number" name="maara" required><br><br>
    <input type="submit" value="Tilaa">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = htmlspecialchars($_POST['nimi']);
    $osoite = htmlspecialchars($_POST['osoite']);
    $maara = (int)$_POST['maara'];

    echo "<h3>Tilauksen yhteenveto:</h3>";
    echo "Nimi: $nimi<br>";
    echo "Osoite: $osoite<br>";
    echo "Määrä: $maara kpl<br>";
}
?>

</body>
</html>
