<?php
/**
 * Controlleur qui permet la gestion de l'accueil
 * 
 * Billegas Lucas
 * 27.04.2023
 */

namespace ShareGames\Controllers;

class HomeController{
    public function Home(){
        
        $output = HomeController::HomeCarte();
        require_once "../src/Views/homeView.php";
    }

    public function HomeCarte(){
        $output = "";

        $output = "<div class='row'>
				<div class='col-lg-4 mb-4'>
					<div class='post-entry-alt'>
						<a href='single.html' class='img-link'><img src='assets/images/img_7_horizontal.jpg' alt='Image' class='img-fluid'></a>
						<div class='excerpt'>
							<h2><a href='single.html'>Titre</a></h2>
							<div class='post-meta align-items-center text-left clearfix'>
								<figure class='author-figure mb-0 me-3 float-start'><img src='assets/images/person_1.jpg' alt='Image' class='img-fluid'></figure>
								<span class='d-inline-block mt-1'>By <a href='#'>Nom personne</a></span>
								<span>&nbsp;-&nbsp; Date</span>
							</div>
							<p>Description</p>
							<p><a href='single.html' class='btn btn-sm btn-outline-primary'>Read More</a></p>
						</div>
					</div>
				</div>
			</div>";


            return $output;
    }
}