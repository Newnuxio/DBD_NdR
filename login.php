<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/index.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Inloggen</h1>

        <form method="post" action="login_handler.php">
            <label>Gebruikersnaam of e-mail</label>
            <input type="text" name="login" required>

            <label>Wachtwoord</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p style="text-align:center;margin-top:15px;">
            <a href="register.php">Account aanmaken</a>
        </p>
    </div>
</div>

</body>
</html>
