<?php

require __DIR__ . '/../controllers/PageController.php';

$pageController = new PageController();

$action = $_GET['action'] ?? 'home';

if (method_exists($pageController, $action)) {
    $pageController->$action();
} else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
