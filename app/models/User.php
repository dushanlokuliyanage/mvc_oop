<?php

require_once __DIR__ . "/../config/Database.php";

class User
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->setUpConn();
    }

    public function create($data)
    {
        $sql = "INSERT INTO user (firstName, lastName, email, password,phoneNumber,gender,address) VALUES (?, ?, ?, ?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
       
        return $stmt->execute([
            $data['firstName'],
            $data['lastName'],
            $data['email'],
             password_hash($data['password'], PASSWORD_BCRYPT),
            $data['phoneNumber'],
            $data['gender'],
            $data['address'],

           
        ]);
    }
}
