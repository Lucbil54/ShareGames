<?php

/**
 * Controlleur qui permet de créer une fiche de jeu
 * 
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Controllers\CreateGameController as ControllersCreateGameController;
use ShareGames\Models\GamesModel;
use ShareGames\Models\TypesModel;

class CreateGameController
{
    public function CreateGame()
    {
        if (!$_SESSION['admin']) {
            header("Location: /");
        } else {

            $message = "";
            $checkbox = self::GenerateCheckbox();

            if (filter_input(INPUT_POST, 'btnCreate')) {
                $files = $_FILES['file'];
                if ($_FILES['file']['name'] != "") {
                    if (isset($_POST['types'])) {
                        $title = filter_input(INPUT_POST, 'title');
                        $description = filter_input(INPUT_POST, 'description');
                        $platform = filter_input(INPUT_POST, "platform");
                        $types = $_POST['types'];

                        $date = date("Y-m-d");

                        $fileName = $_FILES['file']['name'];
                        $file_tmp = $_FILES['file']['tmp_name'];

                        $fileName = GamesModel::NameFileRandom($fileName);

                        move_uploaded_file($file_tmp, "assets/images/" . $fileName);

                        $idGame = GamesModel::CreateGame($date, $description, $title, $fileName, $platform);
                        
                        foreach ($types as $key => $type) {
                            $idType = TypesModel::GetIdTypeByName($type);
                            TypesModel::GiveTypeToGame($idGame, $idType->id);
                        }

                        header("Location: gestionJeux");
                        exit;
                    } else {
                        $message = "Veuillez séléctionnez au moins un type.";
                    }
                } else {
                    $message = "Veuillez ajoutez une image";
                }
            }
        }
        require "../src/Views/createGameView.php";
    }

    public function GenerateCheckbox()
    {

        $types = TypesModel::GetAllTypes();
        $checkbox = "";
        foreach ($types as $type) {
            $checkbox .= "<input style='margin-left: 5px;' type='checkbox' name='types[]' value='$type->type'>$type->type";
        }

        return $checkbox;
    }
}
