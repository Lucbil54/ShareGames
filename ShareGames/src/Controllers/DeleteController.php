<?php

/**
 * Controlleur qui gère la suppression
 * 
 * Billegas Lucas
 * 03.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;
use ShareGames\Models\OpinionsModel;

class DeleteController
{
    public function DeleteOpinion()
    {
        $idOpinion = filter_input(INPUT_GET, "idOpinion");
        $idGame = filter_input(INPUT_GET, "idGame");

        OpinionsModel::DeleteOpinion($idOpinion);
        
        header("Location: detailsJeu?idGame=" . $idGame);
        exit;
    }

    public function DeleteGame(){
        if ($_SESSION['admin']) {
            $idGame = filter_input(INPUT_GET, "idGame");
            GamesModel::DeleteGame($idGame);
        }
        
        header("Location: gestionJeux");
        exit;
    }
}
