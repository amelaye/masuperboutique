<?php
/**
 * --------------------------------------------------
 *  ECRITURE
 * --------------------------------------------------
 */
include('../inc/fonctions.php');

$filename = '../README.MD';
$ajout  = " Bon appetit ! :)";

writeLog($filename, $ajout);