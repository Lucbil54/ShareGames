<?php

namespace projet_routage\Controlleurs;

use ShareGames\Models\UsersModel;

class PasswordForgotControlleur
{
    public function PasswordForgot()
    {
        header('Content-Type: application/json');

        $name = filter_input(INPUT_POST, "username");
        if ($name != "") {
            if (UsersModel::GetUserByName($name) != null) {
                $newPwd = UsersModel::GeneratePassword();

                UsersModel::ChangePassword(password_hash($newPwd, PASSWORD_DEFAULT), UsersModel::GetUserByName($name)->id);
    
                echo json_encode($newPwd);
                exit;
            }
            else{
                echo json_encode("Veuillez remplir le champs nom");
                exit;
            }
            
        }
    }
}
