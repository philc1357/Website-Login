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
        <form action="register_submit.php" method="post" class="stack">
            <label for="user_firstname">Vorname</label>
            <input id="user_firstname" type="text" name="user_firstname" placeholder="Vorname" required>

            <label for="user_lastname">Nachname</label>
            <input id="user_lastname" type="text" name="user_lastname" placeholder="Nachname" required>

            <label for="user_name">Benutzername</label>
            <input id="user_name" type="text" name="user_name" placeholder="Benutzername" required>

            <label for="user_email">Email</label>
            <input id="user_email" type="email" name="user_email" placeholder="Email" required>

            <label for="user_password">Passwort</label>
            <input id="user_password" type="password" name="user_password" placeholder="Passwort" minlength="6" required>

            <button type="submit">Registrieren</button>
        </form>
        <a href="../../index.html">
            <button>Zurück</button>
        </a>
    </div>


    <script src="../../private/js/script.js"></script>
</body>
</html>