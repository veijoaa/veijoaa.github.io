<form method="post" action="">
    <!-- Lomake, jossa käyttäjä syöttää ikänsä numerona -->
    Syötä ikäsi: <input type="number" name="ika" min="0" required>
    <input type="submit" value="Tarkista">
</form>

<?php
// Tarkistetaan, onko lomake lähetetty POST-menetelmällä
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tarkistetaan, onko 'ika'-kenttä asetettu ja ei tyhjä
    if (isset($_POST['ika']) && $_POST['ika'] !== '') {
        $ika = $_POST['ika'];

        // Tarkistetaan, että syöte on kokonaisluku ja ei-negatiivinen
        if (filter_var($ika, FILTER_VALIDATE_INT) === false || $ika < 0) {
        
            // Virheilmoitus, jos syöte ei ole kelvollinen
            echo "Virhe: Syötä kelvollinen, ei-negatiivinen kokonaisluku.";
        } else {
            // Muutetaan syöte kokonaisluvuksi (int)
            $ika = (int)$ika;

            // Ikäryhmien tarkistus
            if ($ika <= 12) {
                echo "Olet lapsi.";  // Ikä 0–12
            } elseif ($ika <= 19) {
                echo "Olet teini.";  // Ikä 13–19
            } elseif ($ika <= 64) {
                echo "Olet aikuinen.";  // Ikä 20–64
            } else {
                echo "Olet seniori.";  // Ikä 65+
            }
        }
    } else {
        // Virheilmoitus, jos ikä puuttuu syötteestä
        echo "Syötä ikä.";
    }
}
?>
