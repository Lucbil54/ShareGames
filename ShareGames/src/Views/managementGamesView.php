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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Gestion des jeux</title>
</head>

<body>
    <?php include "inc/header.php"; ?>

    <section class="section">
        <h1 class="heading text-black mb-3" style="text-align: center; margin-top: 2%;" data-aos="fade-up">Gestion des jeux</h1>
        <br>

        <div class="container" style="margin-bottom: 3%;">
            <a href="/creationJeu" class='btn btn-outline-primary'>Créer une fiche de jeu</a>
        </div>
        <div class="container">
            <div class="row">
                <?php echo $displayGames; ?>
            </div>
        </div>
    </section>

    <?= $displayPagination ?>

    <?php include "inc/footer.php"; ?>
</body>

</html>