<?php

require_once __DIR__ . '/../models/AdminModel.php';
require_once __DIR__ . '/../models/SchoolModel.php'; // Include the school model

class AdminController
{
    private $model;
    private $schoolModel;

    public function __construct()
    {
        $this->model = new AdminModel();
        $this->schoolModel = new SchoolModel(); // Initialize the school model
    }

    // Render the page
    private function render($view, $title, $data = [])
    {
        $content = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($content)) {
            http_response_code(404);
            $content = __DIR__ . '/../views/404.php';
        }

        include __DIR__ . '/../views/layout.php';
    }

    // Admin Dashboard
    public function dashboard()
    {
        $students = $this->model->getDashboardData();
        $schools = $this->model->getSchools();
        $this->render('dashboard', 'Dashboard - Admin Panel', ['students' => $students, 'total_schools' => $schools]);
    }

    // Users Page
    public function users()
    {
        $users = $this->model->getAllUsers();
        $this->render('users', 'Users - Admin Panel', ['users' => $users]);
    }

    // Reports Page
    public function reports()
    {
        $reports = $this->model->getReports();
        $this->render('reports', 'Reports - Admin Panel', ['reports' => $reports]);
    }

    // School Routes
    public function schoolList()
    {
        $schools = $this->schoolModel->getAllSchools();
        $this->render('schools/index', 'Schools - Admin Panel', ['schools' => $schools]);
    }

    public function schoolDetails($id)
    {
        $school = $this->schoolModel->getSchoolById($id);
        $this->render('schools/details', 'School Details - Admin Panel', ['school' => $school]);
    }

    public function createSchool()
    {
        $this->render('schools/create', 'Create School - Admin Panel');
    }

    public function storeSchool()
    {
        $this->schoolModel->store($_POST);
        header('Location: ?action=schoolList');
    }

    public function editSchool($id)
    {
        $school = $this->schoolModel->getSchoolById($id);
        $this->render('schools/edit', 'Edit School - Admin Panel', ['school' => $school]);
    }

    public function updateSchool($id)
    {
        $this->schoolModel->update($id, $_POST);
        header('Location: ?action=schoolList');
    }

    public function deleteSchool($id)
    {
        $this->schoolModel->delete($id);
        header('Location: ?action=schoolList');
    }
}
