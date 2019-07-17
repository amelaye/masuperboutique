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
if(isset($_COOKIE['id_client'])) {
    setcookie('id_client', '', time() - 3600);
}

/**
 * Je suis redirigé.e vers la home page
 */
header('Location:index.php');