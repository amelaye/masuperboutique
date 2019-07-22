<?php
// index.php?id=4
// Tableau associatif array(1) { ["id"]=> string(1) "4" }
var_dump($_GET);
var_dump($_GET["id"]); // 4

if(isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = null;
}