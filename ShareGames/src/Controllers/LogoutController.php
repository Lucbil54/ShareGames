<?php
/**
 * Controlleur qui permet la déconnexion d'un utilisateur
 * 
 * Billegas Lucas
 * 27.04.2023
 */

namespace ShareGames\Controllers;

class LogoutController
{
    public function Logout()
    {
        // Vide la session
        $_SESSION = array();

        // Détruit la session
        session_destroy();

        header("Location: /");
        exit;
    }
}
