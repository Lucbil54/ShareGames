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
    const MAX_MARK = 10;

    const FILTER_DATE = "date";
    const FILTER_MARK = "mark";

    /**
     * Jeux
     *
     * @return void
     */
    public function Games()
    {
        $games = GamesModel::GetAllGames();
        $messageError = "";
        if (isset($_POST["btnSearch"])) {
            $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_SPECIAL_CHARS);
            $games = GamesModel::SearchGamesByTitleOrDescription($search);  
            if (count($games) == 0) {
                $messageError = "Aucuns jeux trouvés avec '$search'.";
                $games = GamesModel::GetAllGames();
            }
        } else if(isset($_POST["btnFilter"])) {
            $filter = filter_input(INPUT_POST, "filter");
            if ($filter == self::FILTER_DATE) {
                $games = GamesModel::GetGameMoreRecently();
            }
            else if ($filter == self::FILTER_MARK) {
                $games = GamesModel::SortedGamesByAverageMark();
            }
        }   
        $displayGames = self::DisplayGames($games);

        require "../src/Views/gamesView.php";
    }

    /**
     * Affichage des jeux
     *
     * @param object $games Les jeux à afficher
     * @return string $output L'affichage des jeux
     */
    public function DisplayGames($games)
    {
        $output = "";

        foreach ($games as $game) {
            // Récupère la moyenne des notes du jeu arrondi à l'entier
            $average = round(GamesModel::AverageMarks(GamesModel::GetMarksOfGame($game->id)));

            $types = TypesModel::GetTypesOfGame($game->id);
            
            $dateFormat = date("d-m-Y", strtotime($game->date));

            $output .=  "<div class='col-lg-4 mb-4'>
            <div class='post-entry-alt'>
                <a href='detailsJeu?idGame=$game->id' class='img-link'><img src='assets/images/$game->vignette' alt='Image' class='img-fluid'></a>
                <div class='excerpt'>
                    <h2><a href='detailsJeu?idGame=$game->id'>$game->titre</a></h2>
                    <div class='post-meta align-items-center text-left clearfix'>
                       <span>$dateFormat</span>";

            foreach ($types as $type) {
                $output .= "<span style='float:right'>&nbsp $type->type</span>";
            }

            $output .= "<br><div style='text-align: center;'>";

            if ($average != 0) {
                // Affichage moyenne sous forme d'étoiles
                for ($i = 0; $i < self::MAX_MARK; $i++) {
                    if ($i < $average) {
                        $output .= "<span class='fa fa-star starChecked'></span>";
                    } else {
                        $output .= "<span class='fa fa-star'></span>";
                    }
                }
            }
            else{
                $output .= "<span>Non noté</span>";
            }
            $output .= "</div></div><p>$game->description</p>
                    <p><a href='detailsJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary cardGame'>Voir plus</a></p></div></div></div>";
        }

        return $output;
    }
}
