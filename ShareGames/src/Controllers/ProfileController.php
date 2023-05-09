<?php

/**
 * Controlleur qui permet la gestion du profil
 * 
 * Billegas Lucas
 * 08.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;
use ShareGames\Models\OpinionsModel;
use ShareGames\Models\UsersModel;

class ProfileController
{
    public function Profile()
    {
        if (isset($_SESSION['idUser'])) {

            $displayGames = "";

            $user = UsersModel::GetUserById($_SESSION['idUser']);

            if ($user->avatar == null) {
                $avatar = UsersModel::USER_AVATAR_DEFAULT;
            }
            else{
                $avatar = $user->avatar;
            }

            $idGames = GamesModel::GetGamesOfUserComment($_SESSION['idUser']);
            $nbGames = count($idGames);
            
            $nbCommentary = OpinionsModel::CountCommentaryOfUser($_SESSION['idUser']);

            if ($nbGames > 0) {
                $displayGames = self::DisplayGames($idGames);
            }

            require_once "../src/Views/profileView.php";
        } else {
            header("Location: /");
            exit;
        }
    }
    /**
     * Affichage des jeux
     *
     * @param array $idGames Les identifiants des jeux à afficher
     * @return string $output L'affichage des jeux
     */
    public function DisplayGames($idGames)
    {
        $countGames = 0;
        $output = "";
        foreach ($idGames as $idGame) {
            
            $game = GamesModel::GetGameById($idGame->id);

            if ($countGames % 2 == 0) {
               $output .= "<div class='row g-2'>";
            }

            $output .= "<div class='col mb-2'><a href='detailsJeu?idGame=$idGame->id'>";
           if ($game->vignette == null) {
            $output .= "<img src='assets/images/". UsersModel::USER_AVATAR_DEFAULT ."'";
           }
           else{
            $output .= "<img src='assets/images/$game->vignette'";
           }
           
           
           $output .= "alt='image 1' class='w-100 h-100 rounded-3'></a>
          </div>";


            if ($countGames % 2 != 0) {
                
                $output .= "</div>";
            }

            $countGames++;            
        }

        return $output;
    }
}
