<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="/dark.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Registreren</h1>

        <form method="post" action="register_handler.php">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" required>

            <label>E-mail</label>
            <input type="email" name="email" required>

            <label>Wachtwoord</label>
            <input type="password" name="password" required>

            <button type="submit">Account maken</button>
        </form>

        <p style="text-align:center;margin-top:15px;">
            <a href="login.php">Terug naar login</a>
        </p>
    </div>
</div>

</body>
</html>
