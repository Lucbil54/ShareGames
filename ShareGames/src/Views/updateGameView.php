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

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/form.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Création d'une fiche de jeu</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="title">Titre: *</label>
                    <input type="text" id="title" name="title" placeholder="Entrez le titre" value="<?= $title ?>" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="platform">Sélectionner la plateforme: *</label>
                    <select name="platform" id="platform">
                        <option value="PS">PS</option>
                        <option value="XBOX">XBOX</option>
                        <option value="PC">PC</option>
                        <option value="Mobile">Mobile</option>
                        <option value="autre" selected>Autre</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="types">Sélectionner les types du jeu: *</label>
                    <?php echo $checkbox; ?>
                </div>
                <div class="col-12 mb-3">
                    <label for="vignette">Sélectionnez une vignette : *</label>
                    <input type="file" name="file" accept="image/*">
                </div>
                <div class="col-12 mb-3">
                    <label for="description">Description (optionnel) :</label>
                    <textarea name="description" cols="30" rows="7" class="form-control"><?= $description ?></textarea>
                </div>

                <div class="col-12">
                    <input type="submit" value="Modification de la fiche" name="btnUpdateGame">
                </div>
                <p style="color:red; text-align:center;"><?php echo $message; ?>
                <p>
            </div>
        </form>
    </div>

    <?php include "inc/footer.php"; ?>
</body>

</html>