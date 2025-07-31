<?php
require_once 'Database/Database.php';

class ProfileModel
{
    private $pdo;

    function __construct()
    {
        $this->pdo = new Database();
    }

    public function getUserProfile($id) {
        $sql = "SELECT user_id, image, first_name, last_name, email, phone_number, role 
                FROM users 
                WHERE user_id = :user_id";
        return $this->pdo->query($sql, [':user_id' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    function updateUser($id, $data)
    {
        return $this->pdo->query("UPDATE users SET image = :image, first_name = :first_name, last_name = :last_name, 
                                  email = :email, phone_number = :phone_number, role = :role, password = :password WHERE user_id = :user_id", [
            'image' => $data['image'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'role' => $data['role'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'user_id' => $id
        ]);
    }
}