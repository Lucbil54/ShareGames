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
use ShareGames\Models\UsersModel;

class UpdateController
{
    /**
     * Modifier l'avis
     *
     * @return void
     */
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

    /**
     * Modifier le jeu
     *
     * @return void
     */
    public function UpdateGame()
    {
        if ($_SESSION['admin']) {
            $idGame = filter_input(INPUT_GET, "idGame");
            $game = GamesModel::GetGameById($idGame);

            $title = $game->titre;
            $description = $game->description;
            $fileName = $game->vignette;

            $message = "";
            $checkbox = FunctionsController::GenerateCheckbox();

            if (filter_input(INPUT_POST, 'btnUpdateGame')) {
                $file = $_FILES['file'];
                if ($file['name'] != "") {
                    // Suppression de l'ancienne image dans le dossier
                    unlink("assets/images/" . $fileName);

                    $fileName = $file['name'];
                    $file_tmp = $file['tmp_name'];

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
                            $idType = TypesModel::GetIdTypeByName($newType);
                            TypesModel::GiveTypeToGame($idGame, $idType->id);
                        }
                        $typeAlreadyExist = false;
                    }

                    // Suppression des types qui n'ont pas été cochés
                    $typesToDelete = array();
                    foreach ($typesOfGame as $key => $typeExist) {
                        if (!in_array($typeExist->type, $newTypes)) {
                            array_push($typesToDelete,  TypesModel::GetIdTypeByName($typeExist->type));
                        }
                    }
                    foreach ($typesToDelete as $typeId) {
                        TypesModel::DeleteTypeOfGame($idGame, $typeId->id);
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

    /**
     * Modifier l'utilisateur
     *
     * @return void
     */
    public function UpdateUser()
    {
        $idUser = $_SESSION['idUser'];

        $btnSubmit = filter_input(INPUT_POST, "btnUpdateUser");
        $keepAvatar = filter_input(INPUT_POST, "keepAvatar");

        $message = "";

        if (isset($btnSubmit)) {
            $user = UsersModel::GetUserById($idUser);

            $avatar = $_FILES['file'];
            $old_pwd = filter_input(INPUT_POST, "oldPwd");

            if ($old_pwd != "") {
                if (password_verify($old_pwd, $user->password)) {

                    $new_pwd = filter_input(INPUT_POST, "newPwd");
                    $new_pwd_confirm = filter_input(INPUT_POST, "newPwdConfirm");

                    if ($new_pwd === $new_pwd_confirm) {
                        UsersModel::ChangePassword(password_hash($new_pwd, PASSWORD_DEFAULT), $idUser);
                    } else {
                        $message = "Les nouveaux mot de passes ne sont pas identiques.";
                    }
                } else {
                    $message = "L'ancien mot de passe est incorrect.";
                }
            }

            $old_avatar = $user->avatar;

            if ($avatar['name'] != "") {

                unlink("assets/images/" . $old_avatar);

                $new_avatar = $avatar['name'];
                $file_tmp = $avatar['tmp_name'];

                $new_avatar = UsersModel::RenameAvatar($new_avatar, $user->login);
                move_uploaded_file($file_tmp, "assets/images/" . $new_avatar);

                UsersModel::ChangeAvatar($new_avatar, $idUser);
            } else if (!$keepAvatar) {

                unlink("assets/images/" . $old_avatar);

                $new_avatar = null;

                UsersModel::ChangeAvatar($new_avatar, $idUser);
            }


            if ($message == "") {
                header("Location: profil");
                exit;
            }
        }

        require "../src/Views/updateProfileView.php";
    }
}
