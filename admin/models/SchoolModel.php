<?php

class SchoolModel
{
    private $pdo;

    public function __construct()
    {
        // Database connection (Modify with your DB credentials)
        $this->pdo = new PDO('mysql:host=localhost;dbname=schooldashboard', 'root', ''); // Modify as needed
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Get all schools
    public function getAllSchools()
    {
        $stmt = $this->pdo->query("SELECT * FROM schools");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a school by its ID
    public function getSchoolById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM schools WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Store a new school
    public function store($data)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO schools (name, address, city, country, created_at, updated_at) 
            VALUES (:name, :address, :city, :country, NOW(), NOW())"
        );
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':city', $data['city']);
        $stmt->bindParam(':country', $data['country']);
        $stmt->execute();
    }

    // Update a school
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE schools SET 
                name = :name, 
                address = :address, 
                city = :city, 
                country = :country, 
                updated_at = NOW() 
            WHERE id = :id"
        );
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':city', $data['city']);
        $stmt->bindParam(':country', $data['country']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Delete a school by ID
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM schools WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
