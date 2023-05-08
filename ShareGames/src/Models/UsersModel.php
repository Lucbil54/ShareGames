<?php

/**
 * Class model pour la gestion d'utilisateurs
 *
 * Billegas Lucas
 * 02.05.2023
 */

namespace ShareGames\Models;

use PDO;

class UsersModel
{
    const USER_AVATAR_DEFAULT = "User_Avatar_Default.png";
    const CHAR_PWD_DEFAULT = 8;

    /**
     * Création d'un utilisateur
     *
     * @param string $name Le nom d'utilisateur
     * @param string $password Le mot de passe hasher
     * @param string $fileName Le nom du fichier
     * @param int $admin Utilisateur admin ou pas
     */
    public static function CreateUser($name, $password, $fileName, $admin)
    {
        $sql = "INSERT INTO utilisateurs (login, password, avatar, est_admin) VALUES (?,?,?,?)";

        $param = [$name, $password, $fileName, $admin];
        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Verifie si le nom d'utilisateur est déjà pris
     *
     * @param string $name Le nom d'utilisateur
     * @return bool Si l'utilisateur existe ou pas
     */
    public static function VerifyIfUserExist($name)
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = ?";

        $param = [$name];
        $result = ConnexionDB::DbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);

        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Renomme l'avatar pour le rendre unique avec le nom d'utilisateur
     *
     * @param string $fileName Le nom du fichier
     * @param string $nameUser Le nom d'utilisateur
     * @return string $fileName Le nouveau nom du fichier
     */
    public static function RenameAvatar($fileName, $nameUser)
    {
        $extension = explode(".", $fileName)[1];
        $fileName = $nameUser . "." . $extension;

        return $fileName;
    }

    /**
     * Récupère l'utilisateur depuis le nom
     *
     * @param string $name Le nom d'utilisateur
     * @return object L'utilisateur
     */
    public static function GetUserByName($name)
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = ?";

        $param = [$name];
        return ConnexionDB::DbRun($sql, $param)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Récupère l'utilisateur depuis l'identitfiant
     *
     * @param string $idUser l'id de l'utilisateur
     * @return object L'utilisateur
     */
    public static function GetUserById($idUser)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id = ?";

        $param = [$idUser];
        return ConnexionDB::DbRun($sql, $param)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Change le mot de passe de l'utilisateur
     *
     * @param string $newPassword Le nouveau mot de passe
     * @param int $idUser L'id de l'utilisateur
     */
    public static function ChangePassword($newPassword, $idUser)
    {
        $sql = "UPDATE utilisateurs SET password = ? WHERE id = ?";
        $param = [$newPassword, $idUser];

        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Change l'avatar de l'utilisateur
     *
     * @param [type] $newAvatar Le nouveau avatar
     * @param [type] $idUser L'id de l'utilisateur
     * @return void
     */
    public static function ChangeAvatar($newAvatar, $idUser)
    {
        $sql = "UPDATE utilisateurs SET avatar = ? WHERE id = ?";
        $param = [$newAvatar, $idUser];

        return ConnexionDB::DbRun($sql, $param);
    }

    /**
     * Génère un mot de passe aléatoire
     *
     * @param int $length La taille du mot de passe
     * @return string $password Le mot de passe
     */
    public static function GeneratePassword($length = self::CHAR_PWD_DEFAULT)
    {

        $characters = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        $password = "";

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, count($characters) - 1)];
        }
        return $password;
    }
}
