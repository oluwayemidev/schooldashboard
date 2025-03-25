<?php

require __DIR__ . '/../app/controllers/UserController.php';

$userController = new UserController();

$action = $_GET['action'] ?? 'profile';

if (method_exists($userController, $action)) {
    $userController->$action();
} else {
    die('Invalid action');
}
