<?php

require __DIR__ . '/../../admin/controllers/AdminController.php';

$adminController = new AdminController();

$action = $_GET['action'] ?? 'dashboard';
$id = $_GET['id'] ?? null;

if (method_exists($adminController, $action)) {
    if (in_array($action, ['schoolList', 'schoolDetails', 'createSchool', 'storeSchool', 'editSchool', 'updateSchool', 'deleteSchool'])) {
        if ($action === 'schoolDetails' && $id) {
            $adminController->$action($id);
        } elseif (in_array($action, ['updateSchool', 'editSchool', 'deleteSchool']) && $id) {
            $adminController->$action($id);
        } else {
            $adminController->$action();
        }
    } else {
        $adminController->$action();
    }
} else {
    http_response_code(404);
    echo "404 - Page Not Found";
}
