<?php

/**
 * Class model pour la gestion des avis
 *
 * Billegas Lucas
 * 03.05.2023
 */

namespace ShareGames\Models;

use PDO;

class OpinionsModel
{
    /**
     * Créer un nouvel avis
     * 
     * @param string $title Le titre du commentaire
     * @param string $description La description du commentaire 
     * @param int $mark La note du commentaire
     * @param int $idUser L'id de l'utilisateur
     * @param int $idGame L'id du jeu
     * @param date $title Le titre du commentaire
     */
    public static function CreateOpinion($title, $description, $mark, $idUser, $idGame, $date)
    {
        $sql = "INSERT INTO avis (date, titre, description, note, utilisateurs_id, jeux_id) VALUES (?,?,?,?,?,?)";

        $param = [$date, $title, $description, $mark, $idUser, $idGame];
        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Récupère tous les avis d'un jeu dans l'ordre chronologique
     * 
     * @param int $idGame L'id du jeu
     * 
     * @return object Les avis 
     */
    public static function GetAllOpinions($idGame){
        $sql = "SELECT * FROM avis WHERE jeux_id = ? ORDER BY date DESC, id DESC";

        $param = [$idGame];
        return ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Supprimer un avis
     * 
     * @param int $idOpinion L'id de l'avis 
     */
    public static function DeleteOpinion($idOpinion){
        $sql = "DELETE FROM avis WHERE id = ?";

        $param = [$idOpinion];
        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Modifier un avis
     *
     * @param int $idOpinion L'id de l'avis
     * @param string $title Le titre de l'avis
     * @param text $description La description de l'avis
     * @param int $mark La note de l'avis
     * @param date $date La date de l'avis
     * @return void
     */
    public static function UpdateOpinion($idOpinion, $title, $description, $mark, $date){
        $sql = "UPDATE avis SET date = ?, titre = ?, description = ?, note = ? WHERE id = ?";

        $param = [$date, $title, $description, $mark, $idOpinion];
        return ConnexionDB::DbRun($sql, $param);
    }
    
    /**
     * Compte les commentaires de l'utilisateurs
     *
     * @param int $idUser l'id de l'utilisateur
     * @return int Le nombre de commentaires
     */
    public static function CountCommentaryOfUser($idUser){
        $sql = "SELECT * FROM avis WHERE utilisateurs_id = ?";

        $param = [$idUser];
        return count(ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ));
    }

}
