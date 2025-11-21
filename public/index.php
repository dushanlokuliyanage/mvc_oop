<?php

require_once __DIR__ . "/../app/controllers/RegisterController.php";
require_once __DIR__ . "/../app/controllers/LogInController.php";
require_once __DIR__ . "/../app/controllers/HomeController.php";
require_once __DIR__ . "/../app/controllers/UserProfileController.php";
require_once __DIR__ . "/../app/controllers/LogoutController.php";
require_once __DIR__ . "/../app/controllers/DeleteAccountController.php";
require_once __DIR__ . "/../app/controllers/UpdateProfileController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$Regcontroller = new RegisterController();
$Logcontroller = new LogInController();
$HomeController = new HomeController();
$UserController = new UserProfileController();
$logoutController = new LogoutController();
$deleteController = new DeleteAccountController();
$updateController = new UpdateProfileController();


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
} elseif ($uri === "/Profile") {
    $UserController->userProfile();
} elseif ($uri === "/logout") {
    $logoutController->userLogout();
} elseif ($uri === "/delectAccount") {
    $deleteController->deleteUser();
} elseif ($uri === "/profileUpdate") {
    $updateController->updateProfile();
} elseif ($uri === "/updated") {
    $updateController->updatedPage();
} elseif ($uri === "/forgotPassword") {
    $Logcontroller->forgotForm();
} elseif ($uri === "/forgotProcess") {
    $Logcontroller->forgotPassword();
} elseif($uri === "/newPassword"){
 $Logcontroller->newPasswordForm();
}elseif($uri === "/newPasswordProcess"){
    $Logcontroller->newPassword();
}



else {
    echo "404 Not Found - Page does not exist";
}
