<?php
/**
 * on crée un tableau pour y stocker d'éventuels
 * messages d'erreurs
 */
$erreurs = [];

/**
 * Si nom  est saisi, il prend la valeur envoyée
 * Sinon, on enregistre un message d'erreur
 */
if(isset($_POST["nom"]) && $_POST["nom"] != "") {
    $nom = htmlspecialchars($_POST["nom"]);
} else {
    $erreurs[] = "Le nom doit être saisi.";
}

/**
 * Si prenom  est saisi, il prend la valeur envoyée
 * Sinon, on enregistre un message d'erreur
 */
if(isset($_POST["prenom"]) && $_POST["prenom"] != "") {
    $prenom = htmlspecialchars($_POST["prenom"]);
} else {
    $erreurs[] = "Le prenom doit être saisi.";
}

/**
 * Si email  est saisi, il prend la valeur envoyée
 * Sinon, on enregistre un message d'erreur
 */
if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = htmlspecialchars($_POST["email"]);
} else {
    $erreurs[] = "L'e-mail doit être saisi.";
}

/**
 * Si le titre est saisi, il prend la valeur envoyée
 * Sinon, on lui attribue une valeur vide
 */
if(isset($_POST["titre"])) {
    $titre = htmlspecialchars($_POST["titre"]);
} else {
    $titre = "";
}

/**
 * Si le titre est saisi, il prend la valeur envoyée
 * Sinon, on lui attribue une valeur vide
 */
if(isset($_POST["message"])) {
    $message = htmlspecialchars($_POST["message"]);
} else {
    $message = "";
}

if(empty($erreurs)) {
    echo 'Votre message : <br>';
    echo 'Votre nom : '.$nom.'<br>';
    echo 'Votre prenom : '.$prenom.'<br>';
    echo 'Titre du message : '.$titre.'<br>';
    echo 'Message : '.$message.'<br>';
} else {
    foreach($erreurs as $erreur) {
        echo $erreur.'<br>';
    }
}

