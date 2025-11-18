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

    // GET USER BY EMAIL (important for login + registration session)
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function logIn($data)
    {
        // Fetch user by email
        $sql = "SELECT * FROM `user` WHERE `email` = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $data['email']
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($data['password'], $user['password'])) {
            // Password is correct
            return $user; // return user data
        }

        return false; // login failed
    }
}
