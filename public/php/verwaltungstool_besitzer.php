<?php
require_once __DIR__ . "/../../private/php/auth.php";
require_once __DIR__ . "/../../private/php/auth_besitzer.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="../css/user_management.css">
</head>

<body>
    
<header>
    <a href="willkommen.php">Willkommen, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
    <form action="../../private/php/logout.php"><button>Logout</button></form>
</header>

<main>
<?php
session_start();

// OPTIONAL: Schutz (nur wenn du willst, dass man eingeloggt sein muss)
if (!isset($_SESSION['user_id'])) {
    header("Location: /public/html/index.html");
    exit;
}

$conn = new mysqli("localhost", "webapp", "einSicheresPasswort", "website_login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, vorname, nachname, username, email, zustand, gruppe_id FROM users";
$result = $conn->query($sql);

if (!$result) {
    die("SQL Fehler: " . $conn->error);
}

echo "<h2>Alle Benutzer</h2>";

echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Gruppe</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
        echo "<td>" . (int)$row['user_id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['vorname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nachname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['zustand']) . "</td>";
        echo "<td>" . (int)$row['gruppe_id'] . "</td>";
        //echo "<td><a href=''><button>Edit</button></a></td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>

<div class="btn_zurueck">
    <a href="willkommen.php"><button>Zurück</button></a>
</div>
</main>


<footer>
    
</footer>

</body>
</html>