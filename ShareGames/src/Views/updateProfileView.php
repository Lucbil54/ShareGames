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

    <link rel="stylesheet" href="assets/css/form.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Modification du profil</title>
</head>

<body>
    <?php include "inc/header.php"; ?>
    <div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="oldPassword">Ancien mot de passe:</label>
                    <input type="password" id="oldPwd" name="oldPwd" minlength="8" placeholder="Entrez votre ancien mot de passe">
                </div>
                <div class="col-6 mb-3">
                    <label for="newPassword">Nouveau mot de passe:</label>
                    <input type="password" id="newPwd" name="newPwd" minlength="8" placeholder="Entrez votre nouveau mot de passe">
                </div>
                <div class="col-6 mb-3">
                    <label for="newPasswordConfirm">Confirmation nouveau mot de passe:</label>
                    <input type="password" id="newPwdConfirm" name="newPwdConfirm" minlength="8" placeholder="Confirmez votre nouveau mot de passe">
                </div>

                <div class="col-12 mb-3">
                    <label for="avatar">Sélectionnez un nouveau avatar:</label>
                    <input type="file" name="file" accept="image/*">

                    <input type="checkbox" name="keepAvatar" id="keepAvatar" checked> Garder votre avatar
                </div>
                

                <div class="col-12">
                    <input type="submit" value="Modification de votre profil" name="btnUpdateUser">
                </div>
                <p style="color:red; text-align:center;"><?php echo $message; ?>
                <p>
            </div>
        </form>
    </div>

    <?php include "inc/footer.php"; ?>
</body>

</html>