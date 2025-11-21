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
            ':email' => $data['email'],

        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($data['password'], $user['password'])) {
            // Password is correct
            return $user; // return user data
        }

        return false; // login failed
    }


    public function delete($data)
    {

        $sql = "DELETE FROM `user` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        return $stmt->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE `user` SET `firstName` = ?, `lastName` = ?, `email` = ?, `phoneNumber` = ?, `gender` = ?, `address` = ? WHERE `id` = ? ";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $data['firstName'],
            $data['lastName'],
            $data['email'],
            $data['phoneNumber'],
            $data['gender'],
            $data['address'],
            $data['id'],

        ]);
    }


    public function forgot($data)
    {

        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':email' => $data['email']
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['email'] == $data['email']) {
            $min = 1000;
            $max = 9999;
            $code =  rand($min, $max);
            // echo $code;

            $sql = "UPDATE `user` SET `veryfyKey` = :fcode WHERE  `email` = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':email' => $data['email'],
                ':fcode' => $code
            ]);

            $_SESSION['fcode'] = $code;
            $_SESSION['email'] = $data['email'];

            return true;
        }

        $sql = "UPDATE `user` SET `password` = :password WHERE `email`= :email";
        $stmt = $this->pdo->prepare($sql);

        password_hash($data['password'], PASSWORD_BCRYPT);

       return $stmt->execute([
            ':email' => $data['email'],
            ':password' => $data['newPassword']
        ]);
    }
}
