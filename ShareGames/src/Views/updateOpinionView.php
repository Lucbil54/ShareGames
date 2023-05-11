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

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">

    <title>Modification d'un avis</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <div class="pt-5 comment-wrap">
        <div class="comment-form-wrap pt-5">
            <h3 style="text-align: center;">Modifier le commentaire</h3>
            <form method="post" class="p-5 bg-light">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="title">Titre *</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="mark">Note *</label>
                        <input type="number" min="0" max="10" class="form-control" id="mark" name="mark" value="<?= $mark ?>" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $description ?></textarea>
                    </div>

                    <input type="submit" class="submitOpinion" value="Modifier le commentaire" class="btn btn-outline-primary" name="btnSubmitOpinion">
            </form>
        </div>
    </div>
    <?php include "inc/footer.php"; ?>
</body>

</html>