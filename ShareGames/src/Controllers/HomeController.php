<?php

/**
 * Controlleur qui permet la gestion de l'accueil
 * 
 * Billegas Lucas
 * 27.04.2023
 */

namespace ShareGames\Controllers;

use ShareGames\Models\GamesModel;

class HomeController
{
	const LIMIT_GAMES_RECENTLY = 5;
	public function Home()
	{
		$IdTopGames = GamesModel::GetTopGames();
		$cardsTopGames = self::CardTopGames($IdTopGames);
		$cardsMoreRecently = self::CardGamesMoreRecently();

		require_once "../src/Views/homeView.php";
	}

	public function CardTopGames($IdTopGames)
	{
		$output = "<div class='row align-items-stretch retro-layout-alt'><div class='two-col d-block d-md-flex justify-content-between'>";
		for ($i = 0; $i < count($IdTopGames); $i++) {
			$game = GamesModel::GetGameById($IdTopGames[$i]);

			$output .= self::CardNormaly($game);
		}
		$output .= "</div></div>";
		return $output;
	}

	public function CardGamesMoreRecently()
	{
		$output = "<div class='row align-items-stretch retro-layout-alt'>";
		$nbCard = 0;
		$games = GamesModel::GetGameMoreRecently();
		while ($nbCard < self::LIMIT_GAMES_RECENTLY) {


			foreach ($games as $game) {

				$nbCard++;
				if ($nbCard == 1) {
					$output .= self::FirstCard($game);
					$output .= "<div class='col-md-7'>";
				} else if ($nbCard % 2 == 0) {
					$output .= "<div class='two-col d-block d-md-flex justify-content-between'>";
				}

				$output .= self::CardNormaly($game);

				if ($nbCard == 3 || $nbCard == 5) {
					$output .= "</div>";
				}
			}

			$output .= "</div></div>";
			return $output;
		}
	}

	public function FirstCard($game)
	{
		// Change le format de la date
		$dateFormat = date("d-m-Y", strtotime($game->date));
		return "<div class='col-md-5 order-md-2'>
					<a href='detailsJeu?idGame=" . $game->id . "' class='hentry img-1 h-100 gradient'>
						<div class='featured-img' style='background-image: url(assets/images/" . $game->vignette . ");'></div>
						<div class='text'>
							<span>" . $dateFormat . "</span>
							<h2>" . $game->titre . "</h2>
						</div>
					</a>
				</div>";
	}

	public function CardNormaly($game)
	{
		// Change le format de la date
		$dateFormat = date("d-m-Y", strtotime($game->date));

		return "<a href='detailsJeu?idGame=" . $game->id . "' class='hentry v-height img-2 ms-auto float-end gradient'>
		<div class='featured-img' style='background-image: url(assets/images/" . $game->vignette . ");'></div>
		<div class='text text-sm'>
			<span>" . $dateFormat . "</span>
			<h2>" . $game->titre . "</h2>
		</div>
	</a>";
	}
}
