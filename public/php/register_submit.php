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
    
</body>
</html>

<?php

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email    = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "webapp", "einSicheresPasswort", "website_login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Prüfen ob username ODER email schon existiert (unsicher) */
$sql = "SELECT user_id FROM users
        WHERE username = '$username' OR email = '$email'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "Benutzername oder Email ist bereits vorhanden!";
    $conn->close();
    exit;
}

/* Neuen User anlegen (unsicher) */
$sql = "INSERT INTO users (vorname, nachname, username, passwort, email)
        VALUES ('$firstname', '$lastname', '$username', '$password', '$email')";

$insertResult = $conn->query($sql);

if ($insertResult) {
    echo'
        <div class="card">
            <p>Erfolgreich registriert!</p>
            <a href="../../index.html">
                <button>Zurück</button>
            </a>
        </div>';
} 
else {
    echo'
        <div class="card">
            <p>Fehler beim Registrieren!</p>
            <a href="pw_forgot.php">
                <button>Zurück</button>
            </a>
        </div>' . $conn->error;
}

$conn->close();


#ohne sql injections
/*$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$dbservername = "localhost";
$dbusername   = "webapp";
$dbpassword   = "einSicheresPasswort";
$dbdatabase   = "website_login";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbdatabase);

if ($conn->connect_error) {
    die("DB-Verbindung fehlgeschlagen");
}

/* Prepared Statement 
$stmt = $conn->prepare(
    "SELECT id FROM users WHERE username = ? AND password = ?"
);

$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$stmt->store_result();

/* IF-Abfrage 
if ($stmt->num_rows === 1) {
    echo "Login erfolgreich";
} else {
    echo "Login fehlgeschlagen";
}

$stmt->close();
$conn->close();
*/