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
    const LIMIT_GET_TOP_GAME = 10;

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
     * Récupérer les fiches de jeu de la plus récente à la plus ancienne
     *
     * @return object Les fiches de jeux 
     */
    public static function GetGameMoreRecently()
    {
        $sql = "SELECT * FROM jeux ORDER BY date DESC, id DESC";

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

    /**
     * Récuperer les notes d'un jeu
     *
     * @param int $idGame L'id du jeu
     * @return object Les notes du jeu
     */
    public static function GetMarksOfGame($idGame)
    {
        $sql = "SELECT note FROM avis INNER JOIN jeux ON jeux.id = avis.jeux_id AND jeux.id = ?";

        $param = [$idGame];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Calcul de la moyenne des notes d'un jeu
     *
     * @param object $marks Les notes du jeu
     * @return double La moyenne du jeu
     */
    public static function AverageMarks($marks)
    {
        $average = 0;
        $nbMarks = count($marks);

        foreach ($marks as $key => $mark) {
            $average += $mark->note;
        }

        if ($nbMarks != 0) {
            $average /= $nbMarks;
        } else {
            $average = 0;
        }

        return $average;
    }

    /**
     * Récuperer les 10 meilleurs jeux
     *
     * @return array $topGames Le tableau des 10 meilleurs jeux
     */
    public static function GetTopGames()
    {
        $games = self::GetAllGames();

        $averageMarks = array();
        foreach ($games as $game) {
            $marks = self::GetMarksOfGame($game->id);

            // Vérifie si le jeu est noté
            if (count($marks) > 0) {
                $average = self::AverageMarks($marks);
                $averageMarks[$game->id] = $average;
            }
        }

        // Ordonne le tableau dans l'ordre décroissant
        arsort($averageMarks);

        $topGames = array();
        $i = 0;
        foreach ($averageMarks as $gameId => $averageMark) {
            // Attribue le jeu dans un tableau
            $topGames[] = self::GetGameById($gameId);
            $i++;
            // Arrête d'ajouter au 10ème
            if ($i == self::LIMIT_GET_TOP_GAME) {
                break;
            }
        }

        return $topGames;
    }

    /**
     * Modifier le jeu
     *
     * @param date $date la date
     * @param string $title le titre
     * @param text $description la description
     * @param string $fileName le nom de la vignette
     * @param string $platform la plateforme
     * @param int $idGame L'id du jeu
     * @return void
     */
    public static function UpdateGame($date, $title, $description, $fileName, $platform, $idGame)
    {
        $sql = "UPDATE jeux SET date = ?, description = ?, titre = ?, vignette = ?, plateforme = ? WHERE id = ?";

        $param = [$date, $description, $title, $fileName, $platform, $idGame];
        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Récuperer les jeux en fonction d'une recherche sur le titre ou la description
     *
     * @param string $search la recherche
     * @return object Les jeux correspondant à la recherche
     */
    public static function SearchGamesByTitleOrDescription($search)
    {
        $sql = "SELECT * FROM jeux WHERE description LIKE ? OR titre LIKE ? ";

        $param = ["%$search%", "%$search%"];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Récuperer les jeux que l'utilisateur a commenté
     *
     * @param [type] $idUser L'id de l'utilisateur
     * @return object Les jeux commentés par l'utilisateur
     */
    public static function GetGamesOfUserComment($idUser)
    {
        $sql = "SELECT DISTINCT jeux.id FROM jeux INNER JOIN avis ON jeux.id = avis.jeux_id INNER JOIN utilisateurs ON utilisateurs.id = avis.utilisateurs_id AND utilisateurs.id = ?";

        $param = [$idUser];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Tri les jeux par la moyenne des notes
     *
     * @return array $sortedGames Le tableau des jeux triés
     */
    public static function SortedGamesByAverageMark()
    {
        $games = self::GetAllGames();

        $averageMarks = array();
        foreach ($games as $game) {
            $marks = self::GetMarksOfGame($game->id);
            if (count($marks) > 0) {
                $average = self::AverageMarks($marks);
                $averageMarks[$game->id] = $average;
            } else {
                $averageMarks[$game->id] = 0;
            }
        }

        // Tri décroissant des moyennes
        arsort($averageMarks);

        $sortedGames = array();
        foreach ($averageMarks as $gameId => $averageMark) {
            $sortedGames[] = self::GetGameById($gameId);
        }

        return $sortedGames;
    }

    /**
     * Récuperer un certain nombre de jeux
     *
     * @return void
     */
    public static function GetGamesByLimit($offset, $next){
        $sql = "SELECT * FROM jeux LIMIT ?, ?";

        $param = [$offset, $next];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }
}
