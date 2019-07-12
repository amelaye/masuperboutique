<?php
require_once('inc/livres.php');

if(count($livres) == 0) {
    die("Pas de livres disponibles !");
}

if(isset($_GET["livre"])) {
    $monLivre = $_GET["livre"];
} else {
    die("Le livre n'existe pas !");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ma super boutique - <?= $livres[$monLivre]["titre"] ?></title>

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
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <?php
            require("inc/liste.php");
            ?>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= $livres[$monLivre]["image"] ?>">
                        </div>
                        <div class="col-md-6">
                            <h3 class="card-title"><?= $livres[$monLivre]["titre"] ?></h3>
                            <h4 class="card-title"><?= $livres[$monLivre]["auteur"] ?></h4>
                            <h4><?= $livres[$monLivre]["prix"] ?> &euro;</h4>
                            <p class="card-text"><?= $livres[$monLivre]["resume"] ?></p>
                            <span class="text-warning"><?php
                                $cp = 0;
                                while($cp < 5) {
                                    if($cp < $livres[$monLivre]["note"]) {
                                        echo '&#9733;';
                                    } else {
                                        echo '&#9734; ';
                                    }
                                    $cp++;
                                }
                             ?></span>
                            <?= $livres[$monLivre]["note"] ?> étoiles <br /><br />
                            <a href="#" class="btn btn-success">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

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