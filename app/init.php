<?php

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require __DIR__ . '/config/database.php';

define('BASE_URL', 'http://localhost/schooldashboard');

require __DIR__ . '/helpers/functions.php';
