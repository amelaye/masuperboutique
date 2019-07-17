<?php

/**
 * Login MySQL
 */
$login = "root";
/**
 * Mon mot de passe à moi est "root"
 * Votre mot de passe à vous est ""
 */
$password = "root";

/**
 * Connexion à la base de données
 */
try {
    $base = 'mysql:host=localhost;dbname=mydb';
    $dbh = new PDO($base, $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    echo "Erreur : ". $e->getMessage()."<br>";
    die();
}

