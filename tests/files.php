<?php
/* On ouvre notre fichier en utilisant le mode r
 * On stocke le résultat de fopen() dans une variable
 * En mode a le fichier ne serait pas lu
 * En mode w le fichier ne serait pas lu, voire supprimé ! */
$fp = fopen('../README.md', 'r');

/* On tente de lire notre fichier. On utilise pre pour
 * conserver la mise en page d'origine de notre fichier */
echo '<pre>';
echo fread($fp, filesize('../README.md'));
echo '</pre>';

// On ferme notre fichier dès qu'on a fini de l'utiliser
fclose($fp);

/**
 * --------------------------------------------------
 *  LECTURE LIGNE PAR LIGNE
 * --------------------------------------------------
 */

/* On ouvre notre fichier en utilisant le mode r
 * On stocke le résultat de fopen() dans une variable */
$fp = fopen('../README.md', 'r');

// On lit les deux premières lignes de notre fichier
echo '<pre>';
echo fgets($fp, filesize('../README.md'));
echo fgets($fp, filesize('../README.md'));
echo '</pre>';

// Ou tant que feof() renvoie false()
while(!feof($fp)) {
    echo fgets($fp);
}

// On ferme notre fichier après utilisation
fclose($fp);

