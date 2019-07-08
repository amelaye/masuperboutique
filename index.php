<?php
    require_once('livres.php');
    if(count($livres) == 0) {
        die("Pas de livres disponibles !");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ma super boutique</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Ma super boutique</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Vous connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Nous contacter</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container" style="margin-top:20px">

    <div class="row">

      <div class="col-lg-3">
          <?php
            if(!isset($SESSION["prenom"])) {
                $prenom = "toi";
            } else {
                $prenom = $SESSION["prenom"];
            }
          ?>
          <h1 class="my-4">Bonjour, <?= $prenom ?></h1>

          <p>
              Aujourd'hui nous sommes le :
              <?php
                echo(date("l jS  F Y"));
              ?>
          </p>


        <h1 class="my-4">Nos supers livres</h1>
        <div class="list-group">
            <?php
            foreach($livres as $k => $livre) { ?>
                <a href="item.php?livre=<?= $k ?>" class="list-group-item"><?php echo($livre["titre"]) ?></a>
                <?php
            }
            ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
          <?php
          $cpt = 0;
          foreach($livres as $k => $livre) {
              if($cpt == 0) {
                  echo '<div class="row">';
              }
              $cpt++;
              ?>


              <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="item.php?livre=<?= $k ?>">
                          <img class="card-img-top" src="<?= $livre["image"] ?>" alt="">
                      </a>
                      <div class="card-body">
                          <h4 class="card-title">
                              <a href="item.php?livre=<?= $k ?>"><?= $livre["titre"] ?></a>
                          </h4>
                          <h4><?= $livre["auteur"] ?></h4>
                          <h5><?= number_format($livre["prix"],2) ?> &euro;</h5>
                          <p class="card-text"><?= mb_substr($livre["resume"], 0, 150) ?> ... </p>
                      </div>
                      <div class="card-footer">
                          <small class="text-muted">
                              <?php
                              $cp = 0;
                              while($cp < 5) {
                                  if($cp < $livre["note"]) {
                                      echo '&#9733;';
                                  } else {
                                      echo '&#9734; ';
                                  }
                                  $cp++;
                              }
                              ?>
                          </small>
                      </div>
                  </div>
              </div>

              <?php
              if($cpt == 3) {
                  $cpt = 0;
                  echo '</div>';
              }
          }
          ?>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ma super boutique 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
