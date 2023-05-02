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

    <title>Connexion</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <form method="post" enctype="multipart/form-data">

        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" minlength="8" required>

        <input type="submit" value="Se connecter" name="login">
        <p class="small mb-5 pb-lg-2"><?php echo $message; ?></p>

    </form>
    <?php include "inc/footer.php"; ?>
</body>

</html>