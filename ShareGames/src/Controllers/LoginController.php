<?php

/**
 * Controlleur qui permet la gestion de la connexion
 * 
 * Billegas Lucas
 * 27.04.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\UsersModel;

class LoginController
{
    /**
     * Connexion
     *
     * @return void
     */
    public function Login()
    {
        define("ADMIN_DEFAULT", 0);

        $message = "";

        if (filter_input(INPUT_POST, 'login')) {
            $name = filter_input(INPUT_POST, 'name');
            $password = filter_input(INPUT_POST, 'password');

            $user = UsersModel::GetUserByName($name);
            if ($user != null) {
                // Vérifie que les mots de passe correspondent
                if (password_verify($password, $user->password)) {

                    $_SESSION['name'] = $user->login;
                    $_SESSION['idUser'] = $user->id;
                    $_SESSION['userIsConnected'] = true;

                    if ($user->est_admin != ADMIN_DEFAULT) {
                        $_SESSION['admin'] = true;
                    } else {
                        $_SESSION['admin'] = false;
                    }

                    header("Location: /");
                    exit;
                } else {
                    $message = "Impossible de se connecter au compte.";
                }
            } else {
                $message = "Impossible de se connecter au compte.";
            }
        }

        require_once "../src/Views/loginView.php";
    }
    
    /**
     * Oublie du mot de passe
     *
     * @return string Le message de retour
     */
    public function PasswordForgot()
    {
        header('Content-Type: application/json');
        
        $name = filter_input(INPUT_POST, "name");
        if ($name != "") {
            if (UsersModel::GetUserByName($name) != null) {
                $newPwd = UsersModel::GeneratePassword();

                UsersModel::ChangePassword(password_hash($newPwd, PASSWORD_DEFAULT), UsersModel::GetUserByName($name)->id);
    
                echo json_encode("Votre nouveau mot de passe est : " . $newPwd);
                exit;
            }
            else{
                echo json_encode("Aucun utilisateur avec ce nom");
                exit;
            }
            
        }else{
            echo json_encode("Veuillez remplir le champs nom");
            exit;
        }
    }
}
