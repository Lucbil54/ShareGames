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
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Profil</title>
</head>

<body>
    <?php include "inc/header.php"; ?>

    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: darkblue; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="assets/images/<?= $avatar ?>" alt="avatar image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                               <a href="modifierProfil" data-mdb-ripple-color="dark" style="z-index: 1;" class="btn btn-outline-primary">Modifier profil</a>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?= $user->login ?></h5>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">

                                <div>
                                    <p class="mb-1 h5"><?= $nbCommentary ?></p>
                                    <p class="small text-muted mb-0">Commentaires</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Les jeux que vous avez commentés</p>
                            </div>

                            <?php echo $displayGames; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "inc/footer.php"; ?>
</body>

</html>