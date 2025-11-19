<?php

require_once __DIR__ . "/../app/controllers/RegisterController.php";
require_once __DIR__ . "/../app/controllers/LogInController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../app/controllers/UserProfileController.php";
require_once __DIR__ . "/../app/controllers/LogoutController.php";
require_once __DIR__ . "/../app/controllers/DeleteAccountController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$Regcontroller = new RegisterController();
$Logcontroller = new LogInController();
$HomeController = new HomeController();
$UserController = new UserProfileController();
$logoutController = new LogoutController();
$deleteController = new DeleteAccountController();


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
} elseif ($uri === "/userProfile") {
    $UserController->userProfile();
} elseif ($uri === "/logout") {
    $logoutController->userLogout();
} elseif ($uri === "/deleteAcc") {
    $deleteController->deletePage();
} elseif ($uri === "/delectAccount") {
    $deleteController->deleteUser();
} else {
    echo "404 Not Found - Page does not exist";
}
