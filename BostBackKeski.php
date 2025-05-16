<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Laku Toimitus</title>
</head>
<body>

<h2>Laku Toimitus</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Turvallinen käsittely
    $nimi = htmlspecialchars($_POST['nimi']);
    $osoite = htmlspecialchars($_POST['osoite']);
    $maara = (int)$_POST['maara'];

    // Näytetään vain yhteenveto
    echo "<h3>Kiitos tilauksestasi!</h3>";
    echo "<strong>Nimi:</strong> $nimi<br>";
    echo "<strong>Osoite:</strong> $osoite<br>";
    echo "<strong>Määrä:</strong> $maara kpl<br>";
     //Yksinkertainen PHP postback (action="" tai $_SERVER['PHP_SELF'])
} else {
    // Näytetään lomake vain jos ei ole vielä lähetetty
    ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        
        Nimi: <input type="text" name="nimi" required><br><br>
        Osoite: <input type="text" name="osoite" required><br><br>
        Määrä (kpl): <input type="number" name="maara" required><br><br>
        <input type="submit" value="Tilaa">
    </form>
    <?php
}
?>

</body>
</html>
