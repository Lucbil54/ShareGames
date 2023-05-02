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
	public function Home()
	{

		$cardsTopGames = HomeController::CardTopGames();
		$cardsMoreRecently = HomeController::CardGamesMoreRecently();
		require_once "../src/Views/homeView.php";
	}

	public function CardTopGames()
	{
		$output = "";

		$output = "<div class='row'>
				<div class='col-lg-4 mb-4'>
					<div class='post-entry-alt'>
						<a href='detailsJeu' class='img-link'><img src='assets/images/img_7_horizontal.jpg' alt='Image' class='img-fluid'></a>
						<div class='excerpt'>
							<h2><a href='single.html'>Titre</a></h2>
							<div class='post-meta align-items-center text-left clearfix'>
								<span>Date</span>
							</div>
							<p>Description</p>
							<p><a href='single.html' class='btn btn-sm btn-outline-primary'>Read More</a></p>
						</div>
					</div>
				</div>
			</div>";


		return $output;
	}

	public function CardGamesMoreRecently()
	{
		$output = "<div class='row align-items-stretch retro-layout-alt'>";
		$nbCard = 0;
		$games = GamesModel::GetGameMoreRecently();

		foreach ($games as $game) {

			$nbCard++;
			if ($nbCard == 1) {
				$output .= HomeController::FirstCard($game);
				$output .= "<div class='col-md-7'>";
			} else if ($nbCard % 2 == 0) {
				$output .= "<div class='two-col d-block d-md-flex justify-content-between'>";
			}

			$output .= HomeController::CardNormaly($game);

			if ($nbCard == 3 || $nbCard == 5) {
				$output .= "</div><br>";
			}
		}
	
		$output .= "</div></div>";
		return $output;
	}

	public function FirstCard($game)
	{
		return "<div class='col-md-5 order-md-2'>
					<a href='detailsJeu' class='hentry img-1 h-100 gradient'>
						<div class='featured-img' style='background-image: url(assets/images/" . $game->vignette . ");'></div>
						<div class='text'>
							<span>" . $game->date . "</span>
							<h2>" . $game->titre . "</h2>
						</div>
					</a>
				</div>";
	}

	public function CardNormaly($game)
	{
		return "<a href='detailsJeu' class='hentry v-height img-2 ms-auto float-end gradient'>
		<div class='featured-img' style='background-image: url(assets/images/". $game->vignette .");'></div>
		<div class='text text-sm'>
			<span>". $game->date ."</span>
			<h2>". $game->titre ."</h2>
		</div>
	</a>";
	}
}
