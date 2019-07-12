<?php
/* Périmetre d'un carré */
function perimetreCarre($cote)
{
    $perimetre = $cote * 4;
    return $perimetre;
}

/* Périmetre d'un rectangle */
function perimetreRectangle($longueur, $largeur)
{
    $perimetre = ($longueur + $largeur) * 2;
    echo "Le périmètre du rectangle est : ".$perimetre."<br>";
}

/* Périmetre d'un cercle */
function perimetreCercle($rayon)
{
    $perimetre = 2 * pi() * $rayon;
    echo "Le périmètre du cercle est : ".round($perimetre, 2)."<br>";
}

/* Perimetre d'un triangle */
function perimetreTriangle($cote1, $cote2, $cote3)
{
    $perimetre = $cote1 + $cote2 + $cote3;
    echo "Le périmètre du triangle est : ".$perimetre."<br>";
}


echo "Le périmètre de mon premier carré est ".perimetreCarre(2).'<br>';
echo "Mon super carré :  ".perimetreCarre(3).'<br>';
perimetreRectangle(3, 2);
perimetreCercle(3);
perimetreTriangle(2, 3, 4);
