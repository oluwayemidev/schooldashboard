<?php

require_once __DIR__ . '/../models/SchoolModel.php';

class SchoolController {
    private $model;

    public function __construct() {
        $this->model = new SchoolModel();  // Assuming you have a SchoolModel class
    }

    // Display a list of schools
    public function index() {
        $schools = $this->model->getAllSchools();
        include __DIR__ . '/../views/schools/index.php';  // View for listing schools
    }

    // Show details for a specific school
    public function show($id) {
        $school = $this->model->getSchoolById($id);
        include __DIR__ . '/../views/schools/details.php';  // View for showing school details
    }

    // Show the form for creating a new school
    public function create() {
        include __DIR__ . '/../views/schools/create.php';  // View for the create form
    }

    // Store a new school in the database
    public function store() {
        // Validate and insert data into the database
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $this->model->addSchool($name, $address, $city, $country);
        header('Location: /admin/school?action=index');
    }

    // Show the form for editing a specific school
    public function edit($id) {
        $school = $this->model->getSchoolById($id);
        include __DIR__ . '/../views/schools/edit.php';  // View for editing school
    }

    // Update a specific school in the database
    public function update($id) {
        // Validate and update the data
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $this->model->updateSchool($id, $name, $address, $city, $country);
        header('Location: /admin/school?action=details&id=' . $id);
    }

    // Delete a specific school from the database
    public function delete($id) {
        $this->model->deleteSchool($id);
        header('Location: /admin/school?action=index');
    }
}
