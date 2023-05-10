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
    <link rel="shortcut icon" href="assets/images/favicon.jpg">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Gestion</title>
</head>

<body>
    <?php include "inc/header.php"; ?>

    <h1 class="heading text-black mb-3" style="text-align: center; margin-top: 2%;" data-aos="fade-up">Gestion des jeux</h1>
    <br>
    <a href="/creationJeu" class='btn btn-sm btn-outline-primary' style="margin-right: 45%; margin-left: 45%; width: 10%;">Créer une fiche de jeu</a>
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row posts-entry">
                <div class="col-lg-8">
                    
                    <?php echo $allGames; ?>

                    <div class="row text-start pt-5 border-top">
                        <div class="col-md-12">
                            <div class="custom-pagination">
                                <?=$displayPagination?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 sidebar">

                </div>
            </div>
        </div>
    </div>
    <?php include "inc/footer.php"; ?>
</body>

</html>