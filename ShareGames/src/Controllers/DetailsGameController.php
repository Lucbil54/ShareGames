<?php

/**
 * Controlleur qui permet la gestion des détails d'un jeu
 * 
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class DetailsGameController
{
    public function DetailsGame()
    {
        require "../src/Views/detailsGameView.php";
    }
}
