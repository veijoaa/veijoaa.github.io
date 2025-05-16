<form method="post" action="">
    Syötä ikäsi: <input type="number" name="ika" min="0" required>
    <input type="submit" value="Tarkista">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ika']) && $_POST['ika'] !== '') {
        $ika = $_POST['ika'];

        // Tarkistetaan, onko syöte kokonaisluku
        if (filter_var($ika, FILTER_VALIDATE_INT) === false) {
            echo "Virhe: Syötä kokonaisluku.";
        } else {
            $ika = (int)$ika;

            if ($ika < 0) {
                echo "Virhe: Ikä ei voi olla negatiivinen.";
            } elseif ($ika < 18) {
                echo "Olet alaikäinen, et saa äänestää.";
            } elseif ($ika <= 120) {
                echo "Olet äänioikeutettu.";
            } else {
                echo "Syötit epärealistisen iän.";
            }
        }
    } else {
        echo "Syötä ikä.";
    }
}
?>
