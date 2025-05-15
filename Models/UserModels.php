<?php
require_once "Database/Database.php";
class UserModel {
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }

    function getUsers(){
        return $this->DB->query('SELECT * FROM 	users ORDER BY 	user_id DESC')->fetchAll(); 
    }
    public function getUserByEmail($email)
    {
    $stmt = $this->DB->query("SELECT * FROM users WHERE email = ?", [$email]);
    return $stmt->fetch();
    }


    function createUser($data)
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        $role = isset($data['role']) ? $data['role'] : 'employee';
    
        $sql = "INSERT INTO users (image, first_name, last_name, email, phone_number, password, role) 
                VALUES ('{$data['image']}', '{$data['first_name']}', '{$data['last_name']}', '{$data['email']}', 
                        '{$data['phone_number']}', '$passwordHash', '$role')";
    
        return $this->DB->query($sql);
    }

    
    function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        return $this->DB->query($sql, ['user_id' => $id])->fetch(PDO::FETCH_ASSOC);
    }
    
    
    function updateUser($id, $data)
    {
        return $this->DB->query("UPDATE users SET image = :image, first_name = :first_name, last_name = :last_name, 
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


    function deleteUser($id)
    {
        return $this->DB->query("DELETE FROM users WHERE user_id = :user_id", ['user_id' => $id]);
    }

    public function show($id)
    {
        $sql = "SELECT users.user_id,users.image, users.first_name, users.last_name, users.email, users.phone_number, users.role, users.password FROM users WHERE users.user_id = :user_id";
        $stmt = $this->DB->query($sql, [':user_id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   
    
}
