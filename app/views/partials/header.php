<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();


$appurl = $_ENV['APP_URL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'School Dashboard' ?></title>
    <link rel="stylesheet" href="<?= $appurl ?>/public/css/styles.css">
</head>

<body>
    <header>
        <div class="logo">&#x262B;</div>

        <nav>
            <a href="/">Home</a>
            <a href="?route=services">Services</a>
            <a href="?route=schools">Schools</a>
            <a href="?route=about">About us</a>
            <a href="?route=contact">Contact us</a>
        </nav>

        <button class="btn-secondary">Get started</button>
    </header>
    <main>