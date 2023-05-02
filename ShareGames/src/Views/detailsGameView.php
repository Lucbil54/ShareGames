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

  <link rel="stylesheet" href="assets/css/style.css">

  <title>Détails du jeu</title>
</head>

<body>
  <?php include "inc/header.php"; ?>

  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('assets/images/hero_5.jpg');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">Titre</h1>
            <div class="post-meta align-items-center text-center">
              <span>Date</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">

            <div class="row my-4">
              <div class="col-md-12 mb-4">
                <img src="assets/images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded">
              </div>
            </div>
            <p>Description</p>
          </div>

          <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard">
                  <img src="assets/images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Nom user</h3>
                  <div class="meta">Date</div>
                  <p>Titre</p>
                  <p>Description</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>

              <li class="comment">
                <div class="vcard">
                  <img src="images/person_2.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>

              <li class="comment">
                <div class="vcard">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>
            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Commenter le jeu</h3>
              <form class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Titre</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="mark">Note</label>
                  <input type="number" min="0" max="10" class="form-control" id="mark" name="mark">
                </div>

                <div class="form-group">
                  <label for="message">Description</label>
                  <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Poster un commentaire" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>






    <?php include "inc/footer.php"; ?>
</body>

</html>