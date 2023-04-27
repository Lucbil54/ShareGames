<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

use ShareGames\Controllers\HomeController;
use ShareGames\Controllers\RegisterController;


Router::form('/', [HomeController::class, 'Home']);
Router::form('/inscription', [RegisterController::class, 'Inscription']);