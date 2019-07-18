<?php

$a = "pouet";
$$a = "coucou"; // équivaut $pouet = "coucou";
$$$a = "aaaaa"; // équivaut à $coucou = "aaaaa";

echo $pouet." ".$a." ".$coucou; // coucou pouet aaaaa