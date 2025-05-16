<form method="post" action="">
    Syötä ensimmäinen luku: <input type="number" step="any" name="num1" required><br><br>
    Syötä toinen luku: <input type="number" step="any" name="num2" required><br><br>
    Valitse laskutoimitus:
    <select name="operaatio" required>
        <option value="">-- Valitse --</option>
        <option value="plus">+</option>
        <option value="miinus">-</option>
        <option value="kertaa">*</option>
        <option value="jaa">/</option>
    </select><br><br>
    <input type="submit" value="Laske">
</form>

<?php
function laske($num1, $num2, $operaatio) {
    if ($operaatio === 'plus') {
        return $num1 + $num2;
    } elseif ($operaatio === 'miinus') {
        return $num1 - $num2;
    } elseif ($operaatio === 'kertaa') {
        return $num1 * $num2;
    } elseif ($operaatio === 'jaa') {
        if ($num2 == 0) {
            return "Virhe: Nollalla jakaminen ei ole sallittua.";
        } else {
            return $num1 / $num2;
        }
    } else {
        return "Virhe: Tuntematon laskutoimitus.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operaatio = $_POST['operaatio'];

    $tulos = laske($num1, $num2, $operaatio);

    echo "<strong>Tulos:</strong> " . $tulos;
}
?>
