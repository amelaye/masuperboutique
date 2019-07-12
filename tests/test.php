<?php
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
echo $tomorrow;
echo date("j m Y H:i:s", $tomorrow);

//echo $_REQUEST["toto"];
//echo $_GET["titi"];