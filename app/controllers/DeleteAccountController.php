<?php

class DeleteAccountController
{

public function deletePage(){
        require_once __DIR__ . "/../views/pages/deleteAcc.php";
}


    public function deleteUser()
    {

        $userId = $_SESSION['user']['id'];
        var_dump($userId);


        $user = new User();

        $saved = $user->delete([
            "id" => $userId
        ]);

        // if ($saved) {
        //     require_once __DIR__ . "/../views/pages/deleteAcc.php";
        // }
    }
}
