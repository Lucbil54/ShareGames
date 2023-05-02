<?php

require '../vendor/autoload.php';
require '../routes/routes.php';

use Pecee\SimpleRouter\SimpleRouter as Router;

session_start();

// Enregistrement du namespace par défaut des controlleurs
Router::setDefaultNamespace('\ShareGames\Controllers');

// Lancement du router
Router::start();
