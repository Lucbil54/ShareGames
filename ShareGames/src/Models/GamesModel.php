<?php

/**
 * Class model pour la gestion des fiches de jeux
 *
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Models;

use PDO;

class GamesModel
{
    /**
     * Création d'une fiche de jeu
     *
     * @param date $date Le nom d'utilisateur
     * @param text $description La description de la fiche
     * @param string $title Le titre de la fiche
     * @param string $fileName Le nom de l'image
     * @param string $platform Le nom de la plateforme
     */
    public static function CreateGame($date, $description, $title, $fileName, $platform)
    {
        $sql = "INSERT INTO jeux (date, description, titre, vignette, plateforme) VALUES (?,?,?,?,?)";

        $param = [$date, $description, $title, $fileName, $platform];
        ConnexionDB::DbRun($sql, $param);

        return ConnexionDB::Db()->lastInsertId();
    }

    /**
     * Donne au fichier un nom unique aléatoire
     * 
     * @param string $fileName Le nom du fichier
     * 
     * @return string le nouveau nom
     */
    public static function NameFileRandom($fileName)
    {
        $extension = explode('.', $fileName)[1];

        $newName = uniqid();

        $newName .= "." . $extension;
        return $newName;
    }

    /**
     * Récupérer les 5 fiches de jeu les plus récentes
     *
     * @return object Les fiches de jeux 
     */
    public static function GetGameMoreRecently()
    {
        $sql = "SELECT * FROM jeux ORDER BY date DESC, id DESC LIMIT 5";

        $param = [];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Récupérer une fiche de jeu avec l'id
     *
     * @param int $idGame L'id de la fiche
     * 
     * @return object La fiche de jeu 
     */
    public static function GetGameById($idGame)
    {
        $sql = "SELECT * FROM jeux WHERE id = ?";

        $param = [$idGame];
        return ConnexionDB::DbRun($sql, $param)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Supprimer un jeu
     *
     * @param int $idGame L'id de la fiche
     * 
     */
    public static function DeleteGame($idGame)
    {
        $sql = "DELETE FROM jeux WHERE id = ?";

        $param = [$idGame];
        return ConnexionDB::DbRun($sql, $param);
    }

     /**
     * Récuperer tous les jeux
     */
    public static function GetAllGames()
    {
        $sql = "SELECT * FROM jeux";

        $param = [];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }
}
