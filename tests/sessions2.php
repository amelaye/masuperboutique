<?php
session_start();
echo "Hello " . $_SESSION["pseudo"] . " ! ";
echo "Vous habitez à ". $_SESSION["ville"]." .";

echo session_id();

//var_dump($_SESSION);
session_destroy(); // suppression "douce"
session_unset(); // suppression "violente"
echo $_SESSION["pseudo"];