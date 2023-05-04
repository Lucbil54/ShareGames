<?php

/**
 * Controlleur qui gère les modifications
 * 
 * Billegas Lucas
 * 04.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;
use ShareGames\Models\OpinionsModel;
use ShareGames\Models\TypesModel;

class UpdateController
{
    public function UpdateOpinion()
    {
        $idOpinion = filter_input(INPUT_GET, "idOpinion");
        $idGame = filter_input(INPUT_GET, "idGame");

        if (filter_input(INPUT_POST, "btnSubmitOpinion")) {
            $title = filter_input(INPUT_POST, "title");
            $mark = filter_input(INPUT_POST, "mark", FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, "description");
            $date = date("Y-m-d");

            OpinionsModel::UpdateOpinion($idOpinion, $title, $description, $mark, $date);

            header("Location: detailsJeu?idGame=" . $idGame);
            exit;
        }

        require "../src/Views/updateOpinionView.php";
    }

    public function UpdateGame()
    {
        if ($_SESSION['admin']) {
            $idGame = filter_input(INPUT_GET, "idGame");
            $game = GamesModel::GetGameById($idGame);

            $title = $game->titre;
            $description = $game->description;
            $fileName = $game->vignette;

            $message = "";
            $checkbox = self::GenerateCheckbox();

            if (filter_input(INPUT_POST, 'btnUpdateGame')) {
                $files = $_FILES['file'];
                if ($_FILES['file']['name'] != "") {
                    // Suppression de l'ancienne image dans le dossier
                    unlink($$fileName);  

                    $fileName = $_FILES['file']['name'];
                    $file_tmp = $_FILES['file']['tmp_name'];

                    $fileName = GamesModel::NameFileRandom($fileName);
                    move_uploaded_file($file_tmp, "assets/images/" . $fileName);
                } 
                if (isset($_POST['types'])) {

                    // Récuperation des champs du formulaire
                    $title = filter_input(INPUT_POST, 'title');
                    $description = filter_input(INPUT_POST, 'description');
                    $platform = filter_input(INPUT_POST, "platform");
                    $newTypes = $_POST['types'];

                    $date = date("Y-m-d");


                    $typesOfGame = TypesModel::GetTypesOfGame($idGame);
                    $typeAlreadyExist = false;
                    
                    // Attribution des types qui ne sont pas encore dans la base de données
                    foreach ($newTypes as $key => $newType) {
                        foreach ($typesOfGame as $key => $typeExist) {
                            if ($typeExist->type == $newType) {
                                $typeAlreadyExist = true;
                            }
                        }
                        if (!$typeAlreadyExist) {
                            $idType = TypesModel::GetTypeByName($newType);
                            TypesModel::GiveTypeToGame($idGame, $idType->id);
                        }
                        $typeAlreadyExist = false;
                    }
                    GamesModel::UpdateGame($date, $title, $description, $fileName, $platform, $idGame);

                    header("Location: gestionJeux");
                    exit;
                } else {
                    $message = "Veuillez séléctionnez au moins un type.";
                }
            }
        }
        require "../src/Views/updateGameView.php";
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
