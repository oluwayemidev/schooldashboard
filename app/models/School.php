<?php

require_once __DIR__ . '/../config/database.php';

class School
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllSchools()
    {
        $stmt = $this->pdo->query("SELECT * FROM schools ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSchoolById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM schools WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSchool($name, $address, $email, $phone)
    {
        $stmt = $this->pdo->prepare("INSERT INTO schools (name, address, email, phone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $address, $email, $phone]);
    }

    public function updateSchool($id, $name, $address, $email, $phone)
    {
        $stmt = $this->pdo->prepare("UPDATE schools SET name = ?, address = ?, email = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$name, $address, $email, $phone, $id]);
    }

    public function deleteSchool($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM schools WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
