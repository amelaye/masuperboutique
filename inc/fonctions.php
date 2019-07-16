<?php

/**
 * Une fonction pour écrire un log :)
 * @param   string  $fileToWrite   Le fichier à écrire
 * @param   string  $expression      La phrase à ajouter
 * @return  bool    La valeur renvoyée
 */
function writeLog($fileToWrite, $expression)
{
    // Assurons nous que le fichier est accessible en écriture
    if (is_writable($fileToWrite)) {

        // Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
        // Le pointeur de fichier est placé à la fin du fichier
        // c'est là que $ajout sera placé
        if (!$fp = fopen($fileToWrite, 'a')) {
            echo "Impossible d'ouvrir le fichier ".$fileToWrite;
            return false;
        }

        // Ecrivons quelque chose dans notre fichier.
        if (!fwrite($fp, $expression)) {
            echo "Impossible d'écrire dans le fichier ".$fileToWrite;
            return false;
        }

        echo "L'écriture de ".$expression." dans le fichier ".$fileToWrite." a réussi";
        fclose($fp);
        return true;
    } else {
        echo "Le fichier ".$fileToWrite." n'est pas accessible en écriture.";
        return false;
    }
}