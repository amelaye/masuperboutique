<?php
/**
 * Je supprime les variables de session
 */
session_start();
session_destroy();

/**
 * Je supprime les cookies s'ils existent
 * Pour ce faire, valeur vide et timestamp négatif
 */
if(isset($_COOKIE['email'])) {
    setcookie('email', '', time() - 3600);
}

if(isset($_COOKIE['prenom'])) {
    setcookie('prenom', '', time() - 3600);
}

/**
 * Je suis redirigé.e vers la home page
 */
header('Location:index.php');