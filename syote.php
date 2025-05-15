<?php
session_start();

function tarkistaSyote($nimi, $sahkoposti) {
      // Puhdistetaan syötteet mahdollisista HTML-erikoismerkeistä
    $nimi = htmlspecialchars(trim($nimi));
    $sahkoposti = htmlspecialchars(trim($sahkoposti));

    if (strlen($nimi) > 100) return "Nimi on liian pitkä!";
    if (!preg_match("/^[a-zA-ZäöåÄÖÅ\s-]+$/u", $nimi)) return "Virheellinen nimi!";
    if (!filter_var($sahkoposti, FILTER_VALIDATE_EMAIL)) return "Virheellinen sähköposti!";
    if (strlen($sahkoposti) > 255) return "Sähköposti on liian pitkä!";

    $domain = explode('@', $sahkoposti)[1] ?? '';
    if (!checkdnsrr($domain, 'MX')) return "Sähköpostin domain ei ole toimiva!";

    return [
        'nimi' => $nimi,
        'sahkoposti' => $sahkoposti
    ];
}

// Tarkistetaan CSRF
if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF-tunniste ei kelpaa!");
}

$tulos = tarkistaSyote($_POST['nimi'], $_POST['sahkoposti']);

if (is_array($tulos)) {
    $rivi = date("Y-m-d H:i:s") . " | Nimi: {$tulos['nimi']} | Sähköposti: {$tulos['sahkoposti']}" . PHP_EOL;
    $tiedosto = 'tiedot.txt';

    if (file_put_contents($tiedosto, $rivi, FILE_APPEND | LOCK_EX)) {
        echo "Tiedot tallennettu tiedostoon!";
    } else {
        echo "Tiedoston kirjoittaminen epäonnistui!";
    }
} else {
    echo "Virhe: " . $tulos;
}
?>
