<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/central.css">
</head>
<body>
    <div class="card">
        <form action="register_submit.php" method="post" class="stack">
            <label for="firstname">Vorname</label>
            <input id="firstname" type="text" name="firstname" placeholder="Vorname" required>

            <label for="lastname">Nachname</label>
            <input id="lastname" type="text" name="lastname" placeholder="Nachname" required>

            <label for="username">Benutzername</label>
            <input id="username" type="text" name="username" placeholder="Benutzername" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" required>

            <label for="password">Passwort</label>
            <input id="password" type="password" name="password" placeholder="Passwort" required>

            <button type="submit">Registrieren</button>
        </form>
        <a href="../../index.html">
            <button>Zurück</button>
        </a>
    </div>


    <script src="../../private/js/script.js"></script>
</body>
</html>