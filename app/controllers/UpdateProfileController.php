<?php

class UpdateProfileController
{

    public function updateProfile()
    {

        $userId = $_SESSION['user']['id'];

        $user = new User();

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];

        $saved = $user->update([

            "id" => $userId,
            "firstName"   => $firstName,
            "lastName"    => $lastName,
            "email"       => $email,
            "phoneNumber" => $phoneNumber,
            "gender"      => $gender,
            "address"     => $address

        ]);

        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['lastName'] = $lastName;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phoneNumber'] = $phoneNumber;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['gender'] = $gender;

        if ($saved) {
            require_once __DIR__ . "/../views/pages/updateProfile.php";
        }
    }
}
