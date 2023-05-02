<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

use ShareGames\Controllers\HomeController;
use ShareGames\Controllers\RegisterController;
use ShareGames\Controllers\LoginController;
use ShareGames\Controllers\LogoutController;
use ShareGames\Controllers\ManagementGamesController;
use ShareGames\Controllers\CreateGameController;
use ShareGames\Controllers\DetailsGameController;


Router::form('/', [HomeController::class, 'Home']);
Router::form('/inscription', [RegisterController::class, 'Register']);
Router::form('/connexion', [LoginController::class, 'Login']);
Router::get('/deconnexion', [LogoutController::class, 'Logout']);
Router::form('/gestionJeux', [ManagementGamesController::class, 'ManagementGames']);
Router::form('/creationJeu', [CreateGameController::class, 'CreateGame']);
Router::form('/detailsJeu', [DetailsGameController::class, 'DetailsGame']);