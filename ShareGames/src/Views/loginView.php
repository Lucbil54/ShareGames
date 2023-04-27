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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/glightbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/flatpickr.min.css">


    <title>Accueil</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form method="post">
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                    <p class="text-white-50 mb-5">Please enter your informations!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                                        <span id="password-validation-icon"></span>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password confirm</label>
                                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control form-control-lg" required />
                                        <span id="password-confirm-validation-icon"></span>
                                    </div>
                                    <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Register" id="register" name="register">
                                </div>
                                <p class="small mb-5 pb-lg-2" id="error" class="text-white-50"></p>

                                <div>
                                    <p class="mb-0">You have an account? <a href="/connexion" class="text-white-50 fw-bold">Login</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>