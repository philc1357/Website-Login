<?php

//Session Cookie setzem zum einloggen
session_start();

//Formulardaten holen
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

/* Verbindung */
$conn = new mysqli("localhost", "webapp", "linui-1357", "website_login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* UNSICHERE SQL-ABFRAGE (SQL Injection möglich!) */
$sql = "SELECT u.user_id, u.group_id, g.group_name AS rolle
        FROM users u
        JOIN groups g ON g.group_id = u.group_id
        WHERE u.user_name = '$user_name' AND u.user_password = '$user_password'
        LIMIT 1";
        
$result = $conn->query($sql);

//Abfrage ob Daten korrekt sind
if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    //WICHTIG: Session-ID nach Login erneuern schützt vor Session Fixation
    //session_regenerate_id(true);

    //Login-Zustand speichern
    $_SESSION['user_id']  = (int)$row['user_id'];
    $_SESSION['user_name'] = $user_name;
    $_SESSION['group_id'] = (int)$row['group_id'];

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