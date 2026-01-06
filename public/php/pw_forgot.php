<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/central.css">
</head>
<body>
    <div class="card">
        <form action="passwort_reset.php" method="post" class="stack">
            <label for="user_firstname">Vorname</label>
            <input id="user_firstname" type="text" name="user_firstname" placeholder="Vorname" required>

            <label for="user_lastname">Nachname</label>
            <input id="user_lastname" type="user_lastname" name="user_lastname" placeholder="Nachname" required>

            <label for="user_name">Benutzername</label>
            <input id="user_name" type="user_name" name="user_name" placeholder="Benutzername" required>

            <label for="user_email">Email</label>
            <input id="user_email" type="user_email" name="user_email" placeholder="Email" required>

            <button type="submit">Passwort zurücksetzen</button>
        </form>
        <a href="../../index.html">
            <button>Zurück</button>
        </a>
    </div>
</body>
</html>
