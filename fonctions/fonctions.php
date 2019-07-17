<?php

/**
 * 3 premiers livres de la liste
 */
function menu($dbh)
{
    try {
        /**
         * Sélection de mes 3 premiers livres
         */
        $sql = "SELECT 
        livre.id_livre AS id_livre,
        livre.titre AS titre
        FROM livre 
        ORDER BY titre ASC
        LIMIT 3
        ";
        $req = $dbh->prepare($sql);
        $req->execute();
        $livres = $req->fetchAll();

        foreach($livres AS $livre) {
            echo '<a href="item.php?livre='.$livre["id_livre"].'" class="list-group-item">';
            echo $livre["titre"];
            echo '</a>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}