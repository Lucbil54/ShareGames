<?php
/**
 * Controlleur qui permet la gestion de différentes fonctions utilisé plusieurs fois dans le projet
 * 
 * Billegas Lucas
 * 09.05.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\TypesModel;

class FunctionsController
{ 
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
            $offset = $limitGameToPage * ($page - 1) - 1;
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
     * 
     * @return string $output L'affichage de la pagination
     */
    public static function DisplayPagination($games, $limitGameToPage){
        $output = "<a href='gestionJeux?page=1'>1</a>";
        $page = 1;
        for ($i=1; $i <= count($games); $i++) { 
            if ($i == $limitGameToPage * $page) {
                $page++;
                $output .= "<a href='gestionJeux?page=$page'>$page</a>";   
            }
            
        }
        return $output;        
    }
}
