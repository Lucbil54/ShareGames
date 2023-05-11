<?php

/**
 * Controlleur qui gère la page des jeux
 * 
 * Billegas Lucas
 * 04.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;
use ShareGames\Models\OpinionsModel;
use ShareGames\Models\TypesModel;

class GamesController
{
    const FILTER_DATE = "date";
    const FILTER_MARK = "mark";

    const LIMIT_GAME_TO_PAGE = 12;

    /**
     * Jeux
     *
     * @return void
     */
    public function Games()
    {
        $games = GamesModel::GetAllGames();
        $messageError = "";

        // Gestion des filtrages et de la recherche
        if (isset($_POST["btnSearch"])) {
            $_SESSION['searchGames'] = null;
            $_SESSION['filter'] = null;
            $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_SPECIAL_CHARS);
            $games = GamesModel::SearchGamesByTitleOrDescription($search);
            $_SESSION['searchGames'] = $search;
            if (count($games) == 0) {
                $messageError = "Aucuns jeux trouvés avec '$search'.";
                $games = GamesModel::GetAllGames();
            }
        } else if (isset($_POST["btnFilter"])) {
            $_SESSION['filter'] = null;
            $_SESSION['searchGames'] = null;
            $filter = filter_input(INPUT_POST, "filter");
            if ($filter == self::FILTER_DATE) {
                $_SESSION['filter'] = self::FILTER_DATE;
                $games = GamesModel::GetGameMoreRecently();
            } else if ($filter == self::FILTER_MARK) {
                $_SESSION['filter'] = self::FILTER_MARK;
                $games = GamesModel::SortedGamesByAverageMark();
            }
        }
        // Gestion si changement de page pour garder les filtres
        else if(isset($_SESSION['searchGames'])){
            $games = GamesModel::SearchGamesByTitleOrDescription($_SESSION['searchGames']);
        }
        else if (isset($_SESSION['filter'])) {
            if ($_SESSION['filter'] == self::FILTER_DATE) {
                $games = GamesModel::GetGameMoreRecently();
            }
            else{
                $games = GamesModel::SortedGamesByAverageMark();
            }
        }

        $page = filter_input(INPUT_GET, "page");

        
        if (count($games) < 1) {
            $games = GamesModel::GetAllGames();
            $_SESSION['searchGames'] = null;
            $_SESSION['filter'] = null;
        }

        $idGames = FunctionsController::GetStrIdsGames($games);

        $offset = FunctionsController::GetOffset($page, self::LIMIT_GAME_TO_PAGE);

        $displayPagination = FunctionsController::DisplayPagination($games, self::LIMIT_GAME_TO_PAGE, "jeux");

        $games = GamesModel::GetGamesByLimit($offset, self::LIMIT_GAME_TO_PAGE, $idGames);

        $displayGames = FunctionsController::DisplayGames($games, false);

        require "../src/Views/gamesView.php";
    }
}
