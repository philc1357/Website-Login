<?php

$username = $_POST['username'];
$password = $_POST['password'];

/* Verbindung */
$conn = new mysqli("localhost", "webapp", "einSicheresPasswort", "website_login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* UNSICHERE SQL-ABFRAGE (SQL Injection möglich!) */
$sql = "SELECT * FROM users 
        WHERE username = '$username' 
        AND passwort = '$password'";

$result = $conn->query($sql);

/* IF-Abfrage */
if ($result && $result->num_rows > 0) {
    header("Location: ../../public/php/willkommen.php");
    exit;
} else {
    header("Location: ../../public/html/login_error.html");
    exit;
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