<?php
// insert.php
/**
 * On inclut la connexion SQL
 */
require_once('inc/mysql-connect.php');

$errors = []; // Initialisation des éventuelles erreurs

/**
 * Je récupère tous mes champs
 */
$nom        = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$email      = $_POST["email"] ?? "";
$password   = $_POST["password"] ?? "";
$adresse    = $_POST["adresse"] ?? "";
$ville      = $_POST["ville"] ?? "";
$codePostal = $_POST["code_postal"] ?? "";

$valueSubmit = "Créer l'utilisateur";
$titre = "Inscription";

/**
 * Quand on envoie le formulaire ...
 */
if(isset($_POST["envoyer"])) {
    $sql = 'INSERT INTO client (
            nom,
            prenom,
            email,
            password,
            adresse,
            ville,
            code_postal
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password,
            :adresse,
            :ville,
            :code_postal
        )';

    /**
     * Je prépare ma requête (d'ajout ou de modification)
     */
    $req = $dbh->prepare($sql);
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':email', $email);
    $req->bindParam(':password', $password);
    $req->bindParam(':adresse', $adresse);
    $req->bindParam(':ville', $ville);
    $req->bindParam(':code_postal', $codePostal);

    /**
     * Execution de la requête
     */
    $result = $req->execute();

    /**
     * Mise en mémoire des erreurs rencontrées
     */
    if(!$result) {
        $error = $req->errorInfo();

        switch($error[0]) {
            case "22001":
                $errors[] = "Attention, vos champs sont trop longs !";
                break;
            case "23000":
                $errors[] = "Cette adresse e-mail existe déjà !";
                break;
        }
    }

    $succes = "Vous avez bien été inscrit.e !";
}