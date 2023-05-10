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

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Jeux</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <section class="section">

        <div class="container" style="margin-bottom: 3%;">
            <form method="post" style="margin-left: 35%; margin-right: 35%; width: 30%; margin-bottom: 2%;">
                <div style="flex-direction:row; display:flex;">
                    <div class="col-6 mb-3">
                        <select name="filter" class="form-control">
                            <option value="">Aucun</option>
                            <option value="date">Date</option>
                            <option value="mark">Note</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="btnFilter" value="Valider" class="btn btn-outline-primary card">
                    </div>
                </div>
            </form>
            <form method="post" style="margin-left: 35%; margin-right: 35%; width: 30%;">
                <div style="display: flex;">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher...">
                    <button type="submit" name="btnSearch" class="btn btn-outline-primary"><span class="bi-search"></span></button>
                </div>
            </form>
            <br>
            <p style="text-align: center; color:red;"><?=$messageError?></p>
        </div>
        <div class="container">
            <div class="row">
                <?php echo $displayGames; ?>
            </div>
        </div>
        </div>
    </section>

    <?php include "inc/footer.php"; ?>
</body>

</html>