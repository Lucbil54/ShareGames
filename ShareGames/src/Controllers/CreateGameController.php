<?php

/**
 * Controlleur qui permet de créer une fiche de jeu
 * 
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class CreateGameController
{
    public function CreateGame()
    {
        if (!$_SESSION['admin']) {
            header("Location: /");
        } else {
            $message = "";
            if (filter_input(INPUT_POST, 'btnCreate')) {

                if (isset($_FILES['file'])) {
                    $title = filter_input(INPUT_POST, 'title');
                    $description = filter_input(INPUT_POST, 'description');
                    $platform = filter_input(INPUT_POST, "platform");

                    $date = date("Y-m-d");

                    $fileName = $_FILES['file']['name'];
                    $file_tmp = $_FILES['file']['tmp_name'];
                    
                    $fileName = GamesModel::NameFileRandom($fileName);

                    move_uploaded_file($file_tmp, "assets/images/" . $fileName);
                    
                    GamesModel::CreateGame($date, $description, $title, $fileName, $platform);

                    header("Location: gestionJeux");
                    exit;
                } else {
                    $message = "Veuillez ajoutez une image";
                }
            }
        }



        require "../src/Views/createGameView.php";
    }
}
