<?php

require_once __DIR__ . "/../app/controllers/RegisterController.php";
require_once __DIR__ . "/../app/controllers/LogInController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$Regcontroller = new RegisterController();
$Logcontroller = new LogInController();
$HomeController = new HomeController();

if ($uri === "/register") {
    $Regcontroller->registerForm();
} elseif ($uri === "/registerProcess") {
    $Regcontroller->registerUser();
} elseif ($uri === "/logIn") {
    $Logcontroller->logInForm();
} elseif ($uri === "/logInProcess") {
    $Logcontroller->logInUser();
} elseif ($uri === "/success") {
    $Regcontroller->successPage();
} elseif ($uri === "/") {
    $HomeController->HomePage();
} else {
    echo "404 Not Found - Page does not exist";
}
