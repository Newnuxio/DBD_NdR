<?php
session_start();
require_once 'config/database.php';

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        if (strlen($password) < 6) {
            $error = "Wachtwoord moet minimaal 6 tekens zijn.";
        } else {
            $stmt = $pdo->prepare(
                "SELECT id FROM users WHERE username = ? OR email = ?"
            );
            $stmt->execute([$username, $email]);

            if ($stmt->fetch()) {
                $error = "Gebruikersnaam of e-mail bestaat al.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare(
                    "INSERT INTO users (username, email, password_hash)
                     VALUES (?, ?, ?)"
                );
                $stmt->execute([$username, $email, $hash]);

                $success = "Account succesvol aangemaakt!";
            }
        }
    } else {
        $error = "Alle velden zijn verplicht.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="assets/dark.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Registreren</h1>

        <?php if ($error): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert success"><?= htmlspecialchars($success) ?></div>
            <a href="login.php">➡ Ga naar login</a>
        <?php else: ?>
            <a href="register.php">⬅ Terug</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
