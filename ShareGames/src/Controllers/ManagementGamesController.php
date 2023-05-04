<?php

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class ManagementGamesController
{
    public function ManagementGames()
    {
        $allGames = ManagementGamesController::DisplayGames();

        require "../src/Views/managementGamesView.php";
    }

    public function DisplayGames()
    {
        $games = GamesModel::GetAllGames();
        $output = "";

        foreach ($games as $game) {
            $output .= "<div class='blog-entry d-flex blog-entry-search-item'> <a href='detailsJeu?idGame=$game->id' class='img-link me-4'>
            <img src='assets/images/$game->vignette' alt='vignette' class='img-fluid'>
            </a>
            <div>
            <span class='date'>" . date("d-m-Y", strtotime($game->date)) . " &bullet; <a href='#'>Type</a></span>
            <h2><a href='detailsJeu?idGame=$game->id'>$game->titre</a></h2>
            <p>$game->description</p>
            <p><a href='supprimerJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary'>Supprimer</a><a style='margin-left:5px;' href='modifierJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary'>Modifier</a></p>
            </div>
            </div>";
        }
        return $output;
    }
}
