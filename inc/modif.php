<?php
// modif.php

/**
 * On inclut la connexion SQL
 */
require_once('inc/mysql-connect.php');

$errors = []; // Initialisation des éventuelles erreurs

/**
 * Je récupère les infos de mon client
 */
$sqlClient = 'SELECT * FROM client WHERE id_client = :id_client';
$reqClient = $dbh->prepare($sqlClient);
$reqClient->bindParam(':id_client', $idClient );
$reqClient->execute();
$client = $reqClient->fetch();


/**
 * On récupère les infos envoyées
 * L'envoi des données en POST est prioritaire
 * Sinon on va chercher les données dans la base client
 * Sinon c'est vide
 */
if(isset($_POST["nom"])) {
    $nom = $_POST["nom"];
} else {
    $nom = $client["nom"] ?? "";
    /* Equivaut à :
    if(isset($client["nom"])) {
        $nom = $client["nom"];
    } else {
        $nom = "";
    }*/
}

if(isset($_POST["prenom"])) {
    $prenom = $_POST["prenom"];
} else {
    $prenom = $client["prenom"] ?? "";
}

if(isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email = $client["email"] ?? "";
}

if(isset($_POST["password"])) {
    $password = $_POST["password"];
} else {
    $password = $client["password"] ?? "";
}

if(isset($_POST["adresse"])) {
    $adresse = $_POST["adresse"];
} else {
    $adresse = $client["adresse"] ?? "";
}

if(isset($_POST["ville"])) {
    $ville = $_POST["ville"];
} else {
    $ville = $client["ville"] ?? "";
}

if(isset($_POST["code_postal"])) {
    $codePostal = $_POST["code_postal"];
} else {
    $codePostal = $client["code_postal"] ?? "";
}

$valueSubmit = "Modifier vos données";
$titre = "Votre compte utilisateur";

/**
 * Quand on envoie le formulaire ...
 */
if(isset($_POST["envoyer"])) {
    /**
     * Requête pour MODIFIER l'utilisateur
     * S'effectue quand il y a SESSION OU COOKIE
     */
    $sql = 'UPDATE client SET
          nom = :nom,
          prenom = :prenom,
          email = :email,
          password = :password,
          adresse = :adresse,
          ville = :ville,
          code_postal = :code_postal
          WHERE
          id_client = :id_client
        ';

    /**
     * Je prépare ma requête (d'ajout ou de modification)
     */
    $req = $dbh->prepare($sql);
    $req->bindParam(':nom', $nom );
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':email', $email);
    $req->bindParam(':password', $password);
    $req->bindParam(':adresse', $adresse);
    $req->bindParam(':ville', $ville);
    $req->bindParam(':code_postal', $codePostal);
    $req->bindParam(':id_client', $idClient);

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

    $succes = "Les modifications ont été effectuées !";
}
