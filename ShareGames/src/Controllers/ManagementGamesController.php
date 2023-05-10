<?php

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class ManagementGamesController
{
    const LIMIT_GAME_TO_PAGE = 10;

    /**
     * Gestion des jeux
     *
     * @return void
     */
    public function ManagementGames()
    {
        $page = filter_input(INPUT_GET, "page");

        $offset = FunctionsController::GetOffset($page, self::LIMIT_GAME_TO_PAGE);
                
        $games = GamesModel::GetGamesByLimit($offset, self::LIMIT_GAME_TO_PAGE);

        $allGames = ManagementGamesController::DisplayGames($games);
        $displayPagination = FunctionsController::DisplayPagination(GamesModel::GetAllGames(), self::LIMIT_GAME_TO_PAGE);
        


        require "../src/Views/managementGamesView.php";
    }
    /**
     * Affichage des jeux
     *
     * @return string $output L'affichage des jeux
     */
    public function DisplayGames($games)
    {
        $output = "";

        foreach ($games as $game) {
            $output .= "<div class='blog-entry d-flex blog-entry-search-item'> <a href='detailsJeu?idGame=$game->id' class='img-link me-4'>
            <img src='assets/images/$game->vignette' alt='vignete' class='img-fluid'>
            </a>
            <div>
            <span class='date'>" . date("d-m-Y", strtotime($game->date)) . "</span>
            <h2><a href='detailsJeu?idGame=$game->id'>$game->titre</a></h2>
            <p>$game->description</p>
            <p><a href='supprimerJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary'>Supprimer</a><a style='margin-left:5px;' href='modifierJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary'>Modifier</a></p>
            </div>
            </div>";
        }
        return $output;
    }

   

   
}
