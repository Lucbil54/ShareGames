<?php

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class ManagementGamesController
{
    const LIMIT_GAME_TO_PAGE = 9;

    /**
     * Gestion des jeux
     *
     * @return void
     */
    public function ManagementGames()
    {
        $page = filter_input(INPUT_GET, "page");

        $offset = FunctionsController::GetOffset($page, self::LIMIT_GAME_TO_PAGE);

        $allGames = GamesModel::GetAllGames();
        
        $conditionIn = FunctionsController::GetStrIdsGames($allGames);

        $games = GamesModel::GetGamesByLimit($offset, self::LIMIT_GAME_TO_PAGE, $conditionIn);

        $displayGames = FunctionsController::DisplayGames($games, true);
        $displayPagination = FunctionsController::DisplayPagination($allGames, self::LIMIT_GAME_TO_PAGE, "gestionJeux");



        require "../src/Views/managementGamesView.php";
    }
}
