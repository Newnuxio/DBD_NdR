<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Uitgelogd</title>
    <link rel="stylesheet" href="assets/dark.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Uitgelogd</h1>
        <div class="alert success">
            Je bent succesvol uitgelogd.
        </div>

        <a href="login.php">➡ Terug naar login</a>
    </div>
</div>

</body>
</html>
