<?php
session_start();
require_once 'config/database.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login && $password) {
        $stmt = $pdo->prepare(
            "SELECT * FROM users 
             WHERE (username = :login OR email = :login) 
             AND is_active = 1"
        );
        $stmt->execute(['login' => $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            $pdo->prepare(
                "UPDATE users SET last_login = NOW() WHERE id = ?"
            )->execute([$user['id']]);

            header("Location: index.php");
            exit;
        } else {
            $error = "Ongeldige inloggegevens.";
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
    <title>Login</title>
    <link rel="stylesheet" href="assets/dark.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Login</h1>

        <?php if ($error): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <a href="login.php">⬅ Terug naar login</a>
    </div>
</div>

</body>
</html>
