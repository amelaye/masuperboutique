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

    <div class="container" style="margin-top:20px">

        <h5>Nous contacter</h5>


        <form action="traitementmail.php" method="post">
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" id="nom">
                </div>
            </div>

            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prenom *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prenom" id="prenom">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail *</label>
                <div class="col-sm-10 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>

            <div class="form-group row">
                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="titre" id="titre">
                </div>
            </div>

            <div class="form-group row">
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="message" id="message"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10" >
                    <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    require('inc/footer.php');
    ?>
</body>