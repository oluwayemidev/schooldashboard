<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


$appurl = $_ENV['APP_URL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <link rel="stylesheet" href="<?= $appurl ?>/public/css/styles.css">
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="/">Visit Site</a>
            <a href="?action=dashboard">Dashboard</a>
            <a href="?action=users">Users</a>
            <a href="?action=reports">Reports</a>
            <a href="?action=schoolList">Schools</a>
        </nav>
    </header>
    <main>
        <?php include $content; ?>
    </main>
</body>

</html>