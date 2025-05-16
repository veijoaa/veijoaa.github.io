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
    switch ($operaatio) {
        case 'plus':
            return $num1 + $num2;
        case 'miinus':
            return $num1 - $num2;
        case 'kertaa':
            return $num1 * $num2;
        case 'jaa':
            if ($num2 == 0) {
                return "Virhe: Nollalla jakaminen ei ole sallittua.";
            }
            return $num1 / $num2;
        default:
            return "Virhe: Tuntematon laskutoimitus.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operaatio = $_POST['operaatio'];

    $tulos = laske($num1, $num2, $operaatio);

    echo "Tulos: " . $tulos;
}
?>
