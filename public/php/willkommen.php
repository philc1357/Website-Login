<?php
require_once __DIR__ . "/../../private/php/auth.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/willkommen.css">
</head>

<header>
    <a href="">Willkommen, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
    <form action="../../private/php/logout.php"><button>Logout</button></form>
</header>

<main>

    <?php if ($_SESSION['group_id'] === 1): ?>
        <h3>Besitzer-Bereich</h3>
        <hr>
        <h3>Verwaltungstools</h3>
        <div class="admin_tool">
            <a href="verwaltungstool_besitzer.php"><button>User-Management</button></a>
            <a href=""><button>User-Management</button></a>
            <a href=""><button>User-Management</button></a>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['group_id'] === 2): ?>
        <h3>Admin-Bereich</h3>
        <hr>
        <h3>Verwaltungstools</h3>
        <div class="admin_tool">
            <a href=""><button>User-Management</button></a>
            <a href=""><button>User-Management</button></a>
            <a href=""><button>User-Management</button></a>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['group_id'] === 3): ?>
        <p>Standard-Benutzer.</p>
    <?php endif; ?>    
</main>

<footer>
    
</footer>

</body>
</html>
