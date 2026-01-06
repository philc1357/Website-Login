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

$user_name = $_POST['user_name'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_email    = $_POST['user_email'];
$user_password = $_POST['user_password'];

$conn = new mysqli("localhost", "webapp", "linui-1357", "website_login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Prüfen ob user_name ODER user_email schon existiert (unsicher) */
$sql = "SELECT user_id FROM users
        WHERE user_name = '$user_name' OR user_email = '$user_email'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "Benutzername oder Email ist bereits vorhanden!";
    $conn->close();
    exit;
}

/* Neuen User anlegen (unsicher) */
$sql = "INSERT INTO users (user_firstname, user_lastname, user_name, user_password, user_email)
        VALUES ('$user_firstname', '$user_lastname', '$user_name', '$user_password', '$user_email')";

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
/*$user_name = $_POST['user_name'] ?? '';
$user_password = $_POST['user_password'] ?? '';

$dbservername = "localhost";
$dbuser_name   = "webapp";
$dbuser_password   = "einSicheresPasswort";
$dbdatabase   = "website_login";

$conn = new mysqli($dbservername, $dbuser_name, $dbuser_password, $dbdatabase);

if ($conn->connect_error) {
    die("DB-Verbindung fehlgeschlagen");
}

/* Prepared Statement 
$stmt = $conn->prepare(
    "SELECT id FROM users WHERE user_name = ? AND user_password = ?"
);

$stmt->bind_param("ss", $user_name, $user_password);
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