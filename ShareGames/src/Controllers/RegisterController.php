<?php
/**
 * Controlleur qui permet la gestion de l'inscription
 * 
 * Billegas Lucas
 * 27.04.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\UsersModel;

class RegisterController{
    
    public function Register(){

        define("ADMIN_DEFAULT", 0);
        
        $message = "";

        if (filter_input(INPUT_POST, 'register')) {
            $name = filter_input(INPUT_POST, 'name');
            $password = filter_input(INPUT_POST, 'password');
            $passwordConfirm = filter_input(INPUT_POST, 'confirmPassword');
            $fileName = $_FILES['avatar']['name'];
            
            // Vérifie que les mots de passe correspondent
            if ($password === $passwordConfirm) {
                // Hash du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
                if (!UsersModel::VerifyIfUserExist($name)) {

                    if ($fileName != null) {
                        $fileName = UsersModel::RenameAvatar($fileName, $name);
                        $file_tmp = $_FILES['avatar']['tmp_name'];
                        move_uploaded_file($file_tmp, "assets/images/" . $fileName);
                    }

                    UsersModel::CreateUser($name, $hashedPassword, $fileName, ADMIN_DEFAULT);
                    header("Location: /connexion");
                    exit;
                }
                else{
                    $message = "Le nom d'utilisateur est déjà utilisé.";
                }
            }
            else{
                $message = "Les mots de passes ne sont pas identiques.";
            }
        }
        
        require_once "../src/Views/registerView.php";
    }

}