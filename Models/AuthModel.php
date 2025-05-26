<?php
require_once 'Database/Database.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = new Database();
    }

    public function register($firstName, $lastName, $email, $phone, $password, $role = 'user') {
        $adminExists = $this->checkAdminExists();
        
        if ($role === 'admin' && $adminExists) {
            $role = 'user';
        }
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, role) 
                VALUES (:firstName, :lastName, :email, :phone_number, :password, :role)";
        $params = [
            ':firstName' => $firstName,
            ':lastName'  => $lastName,
            ':email'     => $email,
            ':phone_number'     => $phone,
            ':password'  => $hashed_password,
            ':role'      => $role
        ];
        return $this->pdo->query($sql, $params);
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        $stmt = $this->pdo->query($sql, $params);
        $user = $stmt->fetch();

        return $user;
    }

    // Check if an admin already exists
    private function checkAdminExists() {
        $sql = "SELECT COUNT(*) as admin_count FROM users WHERE role = 'admin'";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetch();
        
        return $result['admin_count'] > 1;
    }

    // Update login time
    public function updateLoginTime($userId) {
        $sql = "UPDATE users SET last_login = NOW() WHERE user_id = :id";
        $params = [':id' => $userId];
        return $this->pdo->query($sql, $params);
    }
    
    // Set user as active or inactive
    public function setUserActive($userId, $status) {
        $sql = "UPDATE users SET active = :status WHERE user_id = :id";
        $params = [
            ':status' => $status,
            ':id' => $userId
        ];
        $stmt = $this->pdo->query($sql, $params);
        return $stmt ? true : false;
    }


    // Get user login history
    public function getLoginHistory($userId) {
        $sql = "SELECT last_login FROM users WHERE user_id = :id";
        $params = [':id' => $userId];
        $stmt = $this->pdo->query($sql, $params);
        return $stmt->fetch();
    }
}
?>