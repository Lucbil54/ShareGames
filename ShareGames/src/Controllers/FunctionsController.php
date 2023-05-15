<?php
/**
 * Controlleur qui permet la gestion de différentes fonctions utilisé plusieurs fois dans le projet
 * 
 * Billegas Lucas
 * 09.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\TypesModel;
use ShareGames\Models\GamesModel;

class FunctionsController
{ 
    const MAX_MARK = 10;
    
    // Constante qui permet de savoir si c'est l'affichage de la page gestion ou la page jeu
    const PAGE_DISPLAY_MANAGEMENT = true;

    /**
    * Génération de checkbox
    *
    * @return string $checkbox Les checkboxs
    */
   public static function GenerateCheckbox(){
   
        $types = TypesModel::GetAllTypes();
        $checkbox = "";
        foreach ($types as $type) {
            $checkbox .= "<input style='margin-left: 5px;' type='checkbox' name='types[]' value='$type->type'>$type->type";
        }
        return $checkbox;
    }

    /**
     * Récuperer à partir de quelle ligne il faut récupérer les jeux
     *
     * @param int $page Le numéro de la page
     * @param int $limitGameToPage La limite de jeux par page
     * 
     * @return int $offset Le numéro de la ligne
     */
    public static function GetOffset($page, $limitGameToPage){
        if (isset($page) && $page != 1) {
            $offset = $limitGameToPage * ($page - 1);
        }
        else{
            $page = 1;
            $offset = $limitGameToPage * ($page - 1);
        }
        return $offset;
    }

     /**
     * Affiche la pagination en fonction du nombre de jeux
     *
     * @param int $page Le numéro de la page
     * @param int $limitGameToPage La limite de jeux par page
     * @param string $pageName Le nom de la page
     * 
     * @return string $output L'affichage de la pagination
     */
    public static function DisplayPagination($games, $limitGameToPage, $pageName){
        $output = " <div class='row text-start pt-5 border-top paginationCenter'>
                    <div class='col-md-12'>
                    <div class='custom-pagination'>
                    <a href='$pageName?page=1'>1</a>";
        $page = 1;
        for ($i=1; $i <= count($games); $i++) { 
            if ($i == $limitGameToPage * $page) {
                $page++;
                $output .= "<a href='$pageName?page=$page'>$page</a>";   
            }
            
        }
        $output .= "</div></div></div>";
        return $output;        
    }

    /**
     * Récuperer en string la liste des ids de jeux a affiché
     *
     * @param object $games Les jeux
     * @return string La liste des ids 
     */
    public static function GetStrIdsGames($games){
        $idGames = array();
        foreach ($games as $game) {
            array_push($idGames, $game->id);  
        }

        return implode(',', $idGames);
    }

    /**
     * Affichage des jeux sur la page de jeux et de la page de gestion
     * 
     * @param object $games Les jeux à afficher
     * @param bool $pageManagement Page management = true / Page jeux = false;
     * 
     * @return string $ouptut affichage
     */
    public static function DisplayGames($games, $pageManagement){
        $output = "";

        foreach ($games as $game) {

            // Récupère la moyenne des notes arrondi au 10ème (1 chiffre après la virgule)
            $average = round(GamesModel::AverageMarks(GamesModel::GetMarksOfGame($game->id)), 1);
            
            // Récupère la moyenne des notes du jeu arrondi à l'entier
            $averageRound = round($average);

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
                // Affichage des moyennes sous forme d'étoiles
                for ($i = 0; $i < self::MAX_MARK; $i++) {
                    if ($i < $averageRound) {
                        $output .= "<span class='fa fa-star starChecked'></span>";
                    } else {
                        $output .= "<span class='fa fa-star'></span>";
                    }
                }
                $output .= "<span>&nbsp$average/" . self::MAX_MARK ."</span>";
            } else {
                $output .= "<span>Non noté</span>";
            }
            $output .= "</div></div><p>$game->description</p>";
            if ($pageManagement == self::PAGE_DISPLAY_MANAGEMENT) {
                $output .= "<div style='display:block;'><p><a href='modifierJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary cardGame'>Modifier</a>";
                $output .= "<a href='supprimerJeu?idGame=$game->id' class='btn btn-outline-danger cardGame'>Supprimer</a></p></div>";
            }
            else{
                $output .= "<p><a href='detailsJeu?idGame=$game->id' class='btn btn-sm btn-outline-primary cardGame'>Voir plus</a></p>";
            }
            $output .= "</div></div></div>";
        }

        return $output;
    }
}