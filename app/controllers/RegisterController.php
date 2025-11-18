<?php
session_start();

require_once __DIR__ . "/../models/User.php";

class RegisterController
{

    public function registerForm()
    {
        require_once __DIR__ . "/../views/pages/register.php";
    }

    public function successPage()
    {
        require_once __DIR__ . "/../views/pages/success.php";
    }



    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = [];

            $firstName   = trim($_POST['firstName']);
            $lastName    = trim($_POST['lastName']);
            $email       = trim($_POST['email']);
            $password    = trim($_POST['password']);
            $phoneNumber = trim($_POST['phoneNumber']);
            $gender      = trim($_POST['gender']);
            $address     = trim($_POST['address']);

            // VALIDATION
            if (empty($firstName)) $errors[] = "Enter First Name";
            if (empty($lastName)) $errors[] = "Enter Last Name";

            if (empty($email)) {
                $errors[] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            }

            if (empty($password)) {
                $errors[] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters long.";
            }

            if (empty($phoneNumber)) {
                $errors[] = "Phone Number is required";
            } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
                $errors[] = "Phone Number must be 10 digits.";
            }

            if (empty($gender))  $errors[] = "Gender is required";
            if (empty($address)) $errors[] = "Address is required";


            if (!empty($errors)) {

                $data = [$firstName, $lastName, $email, $password, $phoneNumber, $gender];
                $_SESSION['data'] = $data;

                foreach ($errors as $error) {
                    $_SESSION['errors'] = $error;
                    header("Location: /register");
                    exit();
                }
            } else {
                echo "noo";
            }

            $user = new User();

            $saved = $user->create([
                "firstName"   => $firstName,
                "lastName"    => $lastName,
                "email"       => $email,
                "password"    => $password,
                "phoneNumber" => $phoneNumber,
                "gender"      => $gender,
                "address"     => $address
            ]);

            $newUser = $user->getUserByEmail($email);

            $_SESSION['user'] =  [

                'firstName' => $newUser['firstName'],
                'lastName' => $newUser['lastName'],
                'email' => $newUser['email'],
                'password' => $newUser['password'],
                'phoneNumber' => $newUser['phoneNumber'],
                'gender' => $newUser['gender'],
                'address' => $newUser['address']

            ];


            if ($saved) {
                header("Location: /success");
                $_SESSION['success'];
                exit();
            }
        } else {
            echo "No";
        }
    }
}
