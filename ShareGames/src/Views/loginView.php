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

    <link rel="stylesheet" href="assets/css/form.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Connexion</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <form method="post" id="form">

        <label for="name">Nom: *</label>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>

        <label for="password">Mot de passe: *</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" minlength="8" required>

        <input type="submit" value="Se connecter" name="login">
        <div style="margin-top: 1%;">
            <p class="small mb-3 pb-lg-1" style="color: red; text-align:center;"><?php echo $message; ?></p>
        </div>
        <div style="text-align: center;">
            <p class="mb-0"><a href="" style="color: blue;" onclick="ForgotPassword()">Mot de passe oublié ?</a> (Remplissez le champs nom avant de cliquer)</p>
        </div>
    </form>
    <?php include "inc/footer.php"; ?>
</body>
<script>
    function ForgotPassword() {

        var name = document.getElementById("name").value;
        var form = document.getElementById('form');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/mdpOublier');
        xhr.send(formData);

        xhr.addEventListener('load', function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                console.error('Erreur de traitement du serveur');
            }
        });
    }
</script>

</html>