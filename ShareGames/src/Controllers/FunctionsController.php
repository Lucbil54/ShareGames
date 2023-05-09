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
}
