<?php
require_once('livres.php');
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
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Nos supers livres</h1>
            <div class="list-group">
                <?php
                foreach($livres as $k => $livre) { ?>
                    <a href="item.php?livre=<?= $k ?>" class="list-group-item <?php if($k == $monLivre){echo "active";} ?>"><?php echo($livre["titre"]) ?></a>
                    <?php
                }
                ?>
            </div>
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