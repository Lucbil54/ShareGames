<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use projet_routage\Controlleurs\PasswordForgotControlleur;
use ShareGames\Controllers\HomeController;
use ShareGames\Controllers\RegisterController;
use ShareGames\Controllers\LoginController;
use ShareGames\Controllers\LogoutController;
use ShareGames\Controllers\ManagementGamesController;
use ShareGames\Controllers\CreateGameController;
use ShareGames\Controllers\DetailsGameController;
use ShareGames\Controllers\DeleteController;
use ShareGames\Controllers\UpdateController;
use ShareGames\Controllers\GamesController;
use ShareGames\Controllers\ProfileController;

Router::form('/', [HomeController::class, 'Home']);
Router::form('/inscription', [RegisterController::class, 'Register']);
Router::form('/connexion', [LoginController::class, 'Login']);
Router::get('/deconnexion', [LogoutController::class, 'Logout']);
Router::form('/gestionJeux', [ManagementGamesController::class, 'ManagementGames']);
Router::form('/creationJeu', [CreateGameController::class, 'CreateGame']);
Router::form('/detailsJeu', [DetailsGameController::class, 'DetailsGame']);
Router::get('/supprimerAvis', [DeleteController::class, 'DeleteOpinion']);
Router::get('/supprimerJeu', [DeleteController::class, 'DeleteGame']);
Router::form('/modifierAvis', [UpdateController::class, 'UpdateOpinion']);
Router::form('/modifierJeu', [UpdateController::class, 'UpdateGame']);
Router::form('/jeux', [GamesController::class, 'Games']);
Router::form('/profil', [ProfileController::class, 'Profile']);
Router::form('/modifierProfil', [UpdateController::class, 'UpdateUser']);
Router::form('/mdpOublier', [PasswordForgotControlleur::class, 'PasswordForgot']);
