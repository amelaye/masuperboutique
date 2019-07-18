<?php

$c = 6;
$d = &$c; // 6
$c = $c + 5; // 11
echo $d; // 11

/**
 * Avec un foreach
 */
$tableau = [1, 2, 3];
foreach($tableau as &$chiffre) {
    $chiffre = $chiffre + 1;
}
var_dump($tableau); // Les valeurs sont incrémentées

/**
 * Avec une fonction
 */
$a = 1;
$b = 2;

function incrementation(&$a, &$b)
{
    $a = $a + 1;
    $b = $b * 4;
    return true;
}
incrementation($a, $b);

var_dump($a); // affiche 2
var_dump($b); // affiche 8

