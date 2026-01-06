<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="/index.css">
</head>
<body>

<div class="nav">
    <strong>Admin Panel</strong>
    <div>
        <a href="index.php">Dashboard</a>
        <a href="logout_handler.php">Uitloggen</a>
    </div>
</div>

<div class="table-container">
    <h2>Gebruikers</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Gebruikersnaam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP loop -->
            <tr>
                <td>1</td>
                <td>admin</td>
                <td>admin@example.com</td>
                <td>admin</td>
                <td>actief</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
