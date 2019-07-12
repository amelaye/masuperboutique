<?php

/**
 * 3 premiers livres de la liste
 */
function menu($livres)
{
    for($i = 1; $i <= 3; $i++) {
        echo '<a href="item.php?livre='.$i.'" class="list-group-item">';
        echo $livres[$i]["titre"];
        echo '</a>';
    }
}