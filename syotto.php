<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Turvallinen lomake</title>
</head>
<body>
    <h2>Rekisteröitymislomake</h2>
    <form action="syote.php" method="POST">
        <label for="nimi">Nimi:</label><br>
        <input type="text" name="nimi" required><br><br>

        <label for="sahkoposti">Sähköposti:</label><br>
        <input type="email" name="sahkoposti" required><br><br>

        <!-- CSRF-token -->
        <?php
        session_start();
        $csrf_token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrf_token;
        ?>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

        <input type="submit" value="Lähetä">
    </form>
</body>
</html>
