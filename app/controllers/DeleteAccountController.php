<?php

class DeleteAccountController
{

    public function deleteUser()
    {

        $userId = $_SESSION['user']['id'];
        // var_dump($userId);


        $user = new User();

        $saved = $user->delete([
            "id" => $userId
        ]);

        if ($saved) {
            session_unset();
            session_destroy();
            require_once __DIR__ . "/../views/pages/deleteAcc.php";
        }
    }
}
