<?php


require_once __DIR__ . "/../models/User.php";

class LogInController
{

    public function logInForm()
    {
        require_once __DIR__ . "/../views/pages/logIn.php";
    }

    public function logInUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email       = trim($_POST['email']);
            $password    = trim($_POST['password']);

            $user = new User();
            $newUser = $user->getUserByEmail($email);
            $errors = [];


            // VALIDATION

            if (empty($email)) {
                $errors[] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            } elseif (!$newUser) {
                $errors[] = "Email not found. Please register first.";
            }

            if (empty($password)) {
                $errors[] = "Password is required";
            }

            if (!empty($errors)) {

                $data = [$email, $password];
                $_SESSION['Logdata'] = $data;

                foreach ($errors as $error) {
                    $_SESSION['errors'] = $error;
                    header("Location: /logIn");
                    exit();
                }
            }

            $saved = $user->logIn([

                "email"       => $email,
                "password"    => $password,

            ]);

            $_SESSION['user'] =  [
                'id' => $newUser['id'],
                'firstName' => $newUser['firstName'],
                'lastName' => $newUser['lastName'],
                'email' => $newUser['email'],
                'password' => $newUser['password'],
                'phoneNumber' => $newUser['phoneNumber'],
                'gender' => $newUser['gender'],
                'address' => $newUser['address']

            ];
            if ($saved) {

                header("Location: /");
                $_SESSION['home'];
                exit();
            }
        }
    }
}
