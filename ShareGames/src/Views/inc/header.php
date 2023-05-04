<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>
<nav class="site-nav">
	<div class="container">
		<div class="menu-bg-wrap">
			<div class="site-navigation">
				<div class="row g-0 align-items-center">
					<div class="col-2">
						<a href="/" class="logo m-0 float-start">ShareGames</a>
					</div>
					<div class="col-8 text-center">
						<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">

							<li class="active"><a href="/">Home</a></li>
							<li><a href="/jeux">Jeux</a></li>

							<?php if (isset($_SESSION['userIsConnected']) && $_SESSION['userIsConnected']) {
								if($_SESSION['admin']){
									echo "<li><a href='/gestionJeux'>Gestion</a></li>";
								}
								echo "<li><a href='/deconnexion'>Deconnexion</a></li>";
							} else {
							?>
								<li><a href="/connexion">Connexion</a></li>
								<li><a href="/inscription">Inscription</a></li>
							<?php }?>

						</ul>
					</div>
					<div class="col-2 text-end">
						<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
							<span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>