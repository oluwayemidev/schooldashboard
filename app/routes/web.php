<?php

require_once __DIR__ . '/../controllers/PageController.php';

$controller = new PageController();

$routes = [
    'home' => 'home',
    'about' => 'about',
    'contact' => 'contact',
    'admin' => 'admin/dashboard',
    'user' => 'user/dashboard',
    'api' => 'api/index',
];

$requested_route = $_GET['route'] ?? 'home';

if (isset($routes[$requested_route]) && method_exists($controller, $routes[$requested_route])) {
    $controller->{$routes[$requested_route]}();
} else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
