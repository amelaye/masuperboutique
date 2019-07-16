<?php
var_dump(preg_match('(Mac)', php_uname()));
if(isset($_POST["submit"])
    && isset($_FILES['picture'])) {
    /**
     * Définir le répertoire où les fichiers atterissent
     * dirname retourne le chemin absolu d'un fichier
     * __FILE__ renvoit le fichier en cours
     * __FILE__ est une CONSTANTE MAGIQUE
     */
    /**
     * Attention au système : sous UNIX -> slash
     * dirname(__FILE__) . "/uploads/";
     * Sous Windows -> backslash (double \\ à la fin)
     * dirname(__FILE__) . "\uploads\\";
     *
     * php_uname() renvoit les expressions sur le système d'exploitation
     * preg_match() cherche un pattern dans une expression
     * et renvoie true si l'expression est trouvée
     */
    if(preg_match('(Mac)', php_uname()) ||
        preg_match('(Linux)', php_uname())) {
        $uploaddir = dirname(__FILE__) . "/uploads/";
    }
    else if(preg_match('(Windows)', php_uname())) {
        $uploaddir = dirname(__FILE__) . "\uploads\\";
    }
    else {
        $uploaddir = dirname(__FILE__) . "/uploads/";
    }


    /**
     * Je vérifie l'existence du répertoire de téléchargement.
     * S'il n'existe pas, je le crée
     */
    if(!is_dir($uploaddir)) {
        mkdir($uploaddir);
    }

    /**
     * On definit le nom du fichier (précédé de son chemin)
     */

    $uploadfile = $uploaddir . basename($_FILES['picture']['name']);

    /**
     * Upload du fichier
     * Si il a été uploadé, on affiche un message de succès
     * Sinon, on affiche un debug
     */
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
        echo "Le fichier a été téléchargé avec succès.";
    } else {
        echo "Il y a eu un problème : <br />";
        print_r($_FILES['picture']['error']);
    }
}
?>

<h1>Upload de fichiers</h1>

<form action="" method="post" enctype="multipart/form-data">
    <p>Image :
        <input type="file" name="picture" />
        <input type="submit" value="Send" name="submit" />
    </p>
</form>