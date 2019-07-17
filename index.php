<?php
    session_start();

    require_once('inc/mysql-connect.php');
    require_once('fonctions/fonctions.php');

    /**
     * Sélection de tous les livres disponibles
     */
    $sql = "SELECT 
        livre.id_livre AS id_livre,
        livre.titre AS titre,
        livre.photo AS image,
        CONCAT(COALESCE(auteur.prenom, ''),' ', auteur.nom) AS auteur,
        livre.prix AS prix,
        'Pas de resumé' AS resume,
        livre.note AS note
        FROM livre 
        LEFT JOIN auteur 
        ON auteur.id_auteur = livre.id_auteur
        ";
    $req = $dbh->prepare($sql);
    $req->execute();
    $livres = $req->fetchAll();


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

    <?php
    require_once("inc/menu_top.php");
    ?>

  <!-- Page Content -->
  <div class="container" style="margin-top:20px">

    <div class="row">

      <div class="col-lg-3">
          <?php
          if(isset($_SESSION["prenom"])) {
              $personne = $_SESSION["prenom"];
          }
          else if(isset($_COOKIE["prenom"])) {
              $personne = $_COOKIE["prenom"];
          }
          else {
              $personne = "toi";
          }
          ?>
          <h1 class="my-4">Bonjour, <?php echo $personne ?></h1>

          <p>
              Aujourd'hui nous sommes le :
              <?php
                echo(date("l jS  F Y"));
              ?>
          </p>

          <?php
          require("inc/liste.php");
          ?>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
          <?php
          $cpt = 0;
          foreach($livres as $livre) {
              if($cpt == 0) {
                  echo '<div class="row">';
              }
              $cpt++;
              ?>


              <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="item.php?livre=<?php echo $livre["id_livre"] ?>">
                          <img class="card-img-top" src="<?= $livre["image"] ?>" alt="">
                      </a>
                      <div class="card-body">
                          <h4 class="card-title">
                              <a href="item.php?livre=<?php echo $livre["id_livre"] ?>"><?= $livre["titre"] ?></a>
                          </h4>
                          <h4><?= $livre["auteur"] ?></h4>
                          <h5><?php echo number_format($livre["prix"],2) ?> &euro;</h5>
                          <p class="card-text">
                              <?= mb_substr($livre["resume"], 0, 150) ?> ...
                          </p>
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

    <?php
    require('inc/footer.php');
    ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
