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
        }
        else{
            $average = 0;
        }

        return $average;
    }

    public static function GetTopGames(){
        $games = self::GetAllGames();
    
        $tabTopAverage = array();
        $tabIdTopGames = array();
    
        foreach ($games as $game) {
            $marks = self::GetMarksOfGame($game->id);
            if (count($marks) > 0) {
                $average = self::AverageMarks($marks);    

                if (count($tabTopAverage) < 10) {
                    array_push($tabTopAverage, $average);
                    array_push($tabIdTopGames, $game->id);
                }
                else{
                    $minIndex = array_search(min($tabTopAverage), $tabTopAverage);
                    if ($average > $tabTopAverage[$minIndex]) {
                        array_splice($tabTopAverage, $minIndex, 1, $average);
                        array_splice($tabIdTopGames, $minIndex, 1, $game->id);
                    }
                }
            }
        }
        return $tabIdTopGames;
    }


    public static function UpdateGame($date, $title, $description, $fileName, $platform, $idGame){
        $sql = "UPDATE jeux SET date = ?, description = ?, titre = ?, vignette = ?, plateforme = ? WHERE id = ?";

        $param = [$date, $description, $title, $fileName, $platform, $idGame];
        return ConnexionDB::DbRun($sql, $param);
    }

    public static function SearchGamesByTitleOrDescription($search){
        $sql = "SELECT * FROM jeux WHERE description LIKE ? OR titre LIKE ? ";

        $param = ["%$search%", "%$search%"];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }
}
