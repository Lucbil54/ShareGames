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
        return ConnexionDB::DbRun($sql, $param);
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
        $newName = explode('.', $fileName)[0];
        $extension = explode('.', $fileName)[1];

        $newName = uniqid($newName);

        $newName .= "." . $extension;
        return $newName;
    }

    /**
     * Récupérer les 5 fiches de jeu les plus récentes
     *
     * @return object La fiche de jeu 
     */
    public static function GetGameMoreRecently()
    {
        $sql = "SELECT * FROM jeux ORDER BY date LIMIT 5";

        $param = [];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }
}
