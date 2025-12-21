<?php

//Session Cookie setzem zum einloggen
session_start();

//Formulardaten holen
$username = $_POST['username'];
$password = $_POST['password'];

/* Verbindung */
$conn = new mysqli("localhost", "webapp", "einSicheresPasswort", "website_login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* UNSICHERE SQL-ABFRAGE (SQL Injection möglich!) */
$sql = "SELECT u.user_id, u.gruppe_id, g.name AS rolle
        FROM users u
        JOIN gruppe g ON g.gruppe_id = u.gruppe_id
        WHERE u.username = '$username' AND u.passwort = '$password'
        LIMIT 1";
$result = $conn->query($sql);

//Abfrage ob Daten korrekt sind
if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    //WICHTIG: Session-ID nach Login erneuern schützt vor Session Fixation
    //session_regenerate_id(true);

    //Login-Zustand speichern
    $_SESSION['user_id']  = (int)$row['user_id'];
    $_SESSION['username'] = $username;
    $_SESSION['gruppe_id'] = (int)$row['gruppe_id'];

    //Weiterleitung wenn erfolgreich
    header("Location: ../../public/php/willkommen.php");
    exit;
}
//Weiterleitung wenn nicht erfolgreich
else {
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