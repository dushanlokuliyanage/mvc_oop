<?php

class UserProfileController
{
    public function userProfile()
    {

        if (!isset($_SESSION['user'])) {
            header("Location: /logIn");
            exit;
        }
        require_once __DIR__ . "/../views/pages/Profile.php";
    }
}
