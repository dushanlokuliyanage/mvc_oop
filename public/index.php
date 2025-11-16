<?php

require_once __DIR__ . "/../app/controllers/RegisterController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = new RegisterController();


if ($uri === "/") {
    $controller->registerForm();
} elseif ($uri === "/registerProcess") {
    $controller->registerUser();
} elseif ($uri === "/success") {
    require_once __DIR__ . "/../app/views/pages/success.php";
} else {
    echo "404 Not Found - What the Fuck";
}
