<H1>Utilisateurs</H1>
<?php
/**
 * Connexion à la base de données
 */
try {
    $base = 'mysql:host=localhost;dbname=test';
    $dbh = new PDO($base, "root", "root", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    echo "Erreur : ". $e->getMessage()."<br>";
    die();
}

$seq =  'SELECT * FROM user';
$req = $dbh->prepare($seq);
$req->execute();
$result = $req->fetchAll();

foreach($result as $user) {
    echo '<a href="testuserupdate.php?user='.$user['id'].'">'.$user['login'].'</a><br />';
}

?>