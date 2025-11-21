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

                header("Location: /Profile");
                $_SESSION['home'];
                exit();
            }
        }
    }

    public function forgotForm()
    {
        require_once __DIR__ . "/../views/pages/forgotPassword.php";
    }

    public function forgotPassword()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $user = new User();
            $newUser = $user->getUserByEmail($email);
            $errors = [];

            if (empty($email)) {
                $errors[] = "Enter Email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            } elseif (!$newUser) {
                $errors[] = "Email not found. Please register first.";
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: /forgotPassword");
                exit();
            }
            $saved = $user->forgot([

                "email"  => $email,
            ]);

            if ($saved) {

                header("Location: /newPassword");
                exit();
            }
        }
    }



    public function newPasswordForm()
    {

        require_once __DIR__ . "/../views/pages/newPassword.php";
    }

    public function newPassword()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $code = $_POST['v-key'];
            $newPassword = $_POST['n-password'];
            $reNewPassword = $_POST['re-password'];
            $user = new User();
            $errors = [];

            if (empty($code)) {
                $errors[] = "Enter Verify key";
            }

            if ($code != $_SESSION['fcode']) {
                $errors[] = "Verify key is Invalid";
            }

            if (empty($newPassword)) {
                $errors[] = "Enter Password";
            }

            if (empty($reNewPassword)) {
                $errors[] = "Enter Password Again";
            }

            if ($newPassword !== $reNewPassword) {
                $errors[] = "Passwords do not match";
            }

                $data = [$code, $newPassword, $reNewPassword];
                $_SESSION['data'] = $data;

            if (!empty($errors)) {

                foreach ($errors as $error) {
                    $_SESSION['errorNewPassword'] = $error;
                    header("Location: /newPassword");
                    exit();
                }
            }

     $saved = $user->forgot([

                 "newPassword"  => $newPassword,
           
            ]);

            if ($saved) {

                $_SESSION['success'] = $saved;
                header("Location: /success");
              
                 unset($_SESSION['email']);
                exit();
         }
        }
    }
}
