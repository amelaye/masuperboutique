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
                <?php
                if(!isset($_SESSION["prenom"])) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="login.php">';
                    echo 'Vous connecter';
                    echo '</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="deconnect.php">';
                    echo 'Vous déconnecter';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Nous contacter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>