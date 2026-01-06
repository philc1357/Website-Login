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
    
</body>
</html>

<?php

$conn = new mysqli("localhost", "webapp", "linui-1357", "website_login");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// STEP 2: Passwort wurde abgeschickt -> jetzt updaten
if (isset($_POST["password_new"]) && isset($_POST["user_id"])) {
    $password_new = $_POST["password_new"];
    $user_id = $_POST["user_id"];

    $sql = "UPDATE users SET user_password = '$password_new' WHERE user_id = '$user_id'";
    $ok = $conn->query($sql);

    if ($ok) {
        echo '
        <div class="card">
            <p>Passwort erfolgreich geändert</p>
            <a href="../../index.html">
                <button>Zurück</button>
            </a>
        </div>';
    }
    else {
        echo '
        <div class="card">
            <p>Fehler beim Passwort ändern!</p>
            <a href="pw_forgot.php">
                <button>Zurück</button>
            </a>
        </div>';
    }

    $conn->close();
    exit;
}

// STEP 1: Identitätsdaten prüfen
$username  = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];

$sql = "SELECT user_id FROM users
        WHERE vorname = '$firstname' AND nachname = '$lastname' AND username = '$username' AND email = '$email'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];

    echo '<div class="card">
        <form action="passwort_reset.php" method="post" class="stack">
            <input type="hidden" name="user_id" value="'.$user_id.'">

            <label for="password_new">Neues Passwort</label>
            <input id="password_new" type="text" name="password_new" placeholder="Neues Passwort" required>

            <button type="submit">Passwort zurücksetzen</button>
        </form>
    </div>';

    $conn->close();
    exit;
}

echo'
    <div class="card">
        <p>Fehler beim Passwort ändern!</p>
        <a href="pw_forgot.php">
            <button>Zurück</button>
        </a>
    </div>';
$conn->close();
