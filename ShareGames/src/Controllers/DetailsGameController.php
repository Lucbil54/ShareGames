<?php

/**
 * Controlleur qui permet la gestion des détails d'un jeu
 * 
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;
use ShareGames\Models\OpinionsModel;
use ShareGames\Models\TypesModel;
use ShareGames\Models\UsersModel;

class DetailsGameController
{
    /**
     * Détails du jeu
     *
     * @return void
     */
    public function DetailsGame()
    {
        $idGame = filter_input(INPUT_GET, "idGame");

        $game = GamesModel::GetGameById($idGame);
        $opinions = OpinionsModel::GetAllOpinions($idGame);

        $nbOpinions = count($opinions);

        $displayOpinions = "";

        if ($nbOpinions > 0) {
            $displayOpinions = self::DisplayOpinions($opinions, $idGame);
        }

        $listTypes = self::DisplayTypes($idGame);

        // Poster un avis
        if (filter_input(INPUT_POST, "btnSubmitOpinion")) {
            $title = filter_input(INPUT_POST, "title");
            $mark = filter_input(INPUT_POST, "mark", FILTER_VALIDATE_INT);
            $description = filter_input(INPUT_POST, "description");
            $date = date("Y-m-d");

            OpinionsModel::CreateOpinion($title, $description, $mark, $_SESSION['idUser'], $idGame, $date);
            header("Location: detailsJeu?idGame=" . $idGame);
            exit;
        }


        require "../src/Views/detailsGameView.php";
    }

    /**
     * Affichage des avis
     *
     * @param object $opinions les avis à afficher
     * @param int $idGame L'id du jeu
     * @return string $output L'affichage des avis
     */
    public function DisplayOpinions($opinions, $idGame)
    {
        $output = "<ul class='comment-list'>";
        foreach ($opinions as $opinion) {
            $user = UsersModel::GetUserById($opinion->utilisateurs_id);

            $output .= "<li class='comment'>
            <div class='vcard'>";

            if ($user->avatar == null) {
                $output .= "<img src='assets/images/" . UsersModel::USER_AVATAR_DEFAULT . "' alt='Image placeholder'>";
            } else {
                $output .= "<img src='assets/images/$user->avatar' alt='Image placeholder'>";
            }

            $output .= "</div>
            <div class='comment-body'>
              <h3>$user->login</h3>
              <div class='meta'>" . date("d-m-Y", strtotime($opinion->date)) . "</div>
              <br>
              <h5>$opinion->titre</h5>
              <p>$opinion->description</p>";
            if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == $user->id || isset($_SESSION['admin']) && $_SESSION['admin']) {
                $output .= "<p><a href='supprimerAvis?idOpinion=" . $opinion->id . "&idGame=" . $idGame . "' class='reply rounded'>Supprimer</a>";
            }

            if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == $user->id) {
                $output .= "<a href='modifierAvis?idOpinion=" . $opinion->id . "&idGame=" . $idGame . "' class='reply rounded'>Modifier</a></p>";
            }
            else{
                $output .= "</p>";
            }

            $output .= "</div>
          </li>";
        }
        $output .= "</ul>";
        return $output;
    }

    /**
     * Affichage des types du jeu dans une liste
     *
     * @param int $idGame L'id du jeu
     * @return string $output L'affichage des types
     */
    public function DisplayTypes($idGame)
    {
        $types = TypesModel::GetTypesOfGame($idGame);
        $output = "";

        foreach ($types as $key => $type) {

            $output .= "<li><a href='#'>$type->type</a></li>";
        }
        return $output;
    }
}
