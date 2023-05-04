<?php

/**
 * Class model pour la gestion des types
 *
 * Billegas Lucas
 * 03.05.2023
 */

namespace ShareGames\Models;

use PDO;

class TypesModel
{

    /**
     * Récuperer tous les types de jeux
     */
    public static function GetAllTypes()
    {
        $sql = "SELECT * FROM types";

        $param = [];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    public static function GetTypeByName($type){
        $sql = "SELECT id FROM types WHERE type = ?";

        $param = [$type];
        return ConnexionDB::DbRun($sql, $param)->fetch(PDO::FETCH_OBJ);
    }

    public static function GiveTypeToGame($idGame, $idType){
        $sql = "INSERT INTO jeux_has_types(jeux_id, types_id) VALUES (?,?)";

        $param = [$idGame, $idType];
        return ConnexionDB::DbRun($sql, $param);
    }

    public static function GetTypesOfGame($idGame){
        $sql = "SELECT types_id FROM jeux_has_types WHERE jeux_id = ?";

        $param = [$idGame];
        $types_id = ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);

        $types = array();

        
        foreach ($types_id as $key => $type_id) {
            $sql = "SELECT type FROM types WHERE id = ?";

            $param = [$type_id->types_id];

            array_push($types, ConnexionDB::DbRun($sql, $param)->fetch(PDO::FETCH_OBJ));
        }

        return $types;
    }

    public static function DeleteTypeOfGame($idGame, $idType){
        $sql = "DELETE FROM jeux_has_types WHERE jeux_id = ? AND types_id = ?";

        $param = [$idGame, $idType];
        return ConnexionDB::DbRun($sql, $param);
    }
}
