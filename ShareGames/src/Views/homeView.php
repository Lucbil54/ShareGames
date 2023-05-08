<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!Doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<!--<link rel="shortcut icon" href="assets/assets/images/favicon.png">-->

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="stylesheet" href="assets/css/style.css">

	<title>Accueil</title>
</head>

<body>
	<?php include "inc/header.php" ?>

	<section class="section">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Les 10 meilleurs jeux</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<!-- integration des cartes -->

			<?php echo $cardsTopGames; ?>

		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Les jeux les plus récents</h2>
				</div>
			</div>

			<?php echo $cardsMoreRecently; ?>

		</div>
	</div>
	<?php include "inc/footer.php"; ?>
</body>

</html>