<?php

require_once __DIR__ . '/../../app/config/database.php';

class AdminModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function getDashboardData()
    {
        try {
            $stmt = $this->pdo->query("SELECT 
                (SELECT COUNT(*) FROM users) AS total_students, 
                (SELECT COUNT(*) FROM reports) AS total_reports
            ");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching dashboard data: " . $e->getMessage());
        }
    }

    public function getAllUsers()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM users ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching users: " . $e->getMessage());
        }
    }

    public function getUserById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching user: " . $e->getMessage());
        }
    }

    public function addUser($name, $email, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            return $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);
        } catch (PDOException $e) {
            die("Error adding user: " . $e->getMessage());
        }
    }

    public function updateUser($id, $name, $email)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            return $stmt->execute([
                'id' => $id,
                'name' => $name,
                'email' => $email
            ]);
        } catch (PDOException $e) {
            die("Error updating user: " . $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            die("Error deleting user: " . $e->getMessage());
        }
    }

    public function getReports()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM reports ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching reports: " . $e->getMessage());
        }
    }

    public function getReportById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM reports WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching report: " . $e->getMessage());
        }
    }

    public function addReport($title, $content, $user_id)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO reports (title, content, user_id) VALUES (:title, :content, :user_id)");
            return $stmt->execute([
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id
            ]);
        } catch (PDOException $e) {
            die("Error adding report: " . $e->getMessage());
        }
    }

    public function deleteReport($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM reports WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            die("Error deleting report: " . $e->getMessage());
        }
    }
    public function getSchools()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM schools");
        return $stmt->fetchColumn();
    }
}
