<html>

<body>

<?php

function tousLesMois($listeMois)
{
    echo "<h1>Voici ma première fonction !</h1>";
    /** Tous les mois en français */
    for($i = 1;$i <= 12; $i++) {
        echo $i." - ";
        echo $listeMois[$i]["fr"]."<br>";
    }
}

function afficheUnMois($tableau, $numeroMois)
{
    echo $tableau[$numeroMois]["fr"];
}

$mois = [
  1 => [
      "fr" => "Janvier",
      "en" => "January"
  ],
  2 => [
      "fr" => "Fevrier",
      "en" => "February"
  ],
  3 => [
      "fr" => "Mars",
      "en" => "March"
  ],
  4 => [
      "fr" => "Avril",
      "en" => "April"
  ],
  5 => [
      "fr" => "Mai",
      "en" => "May"
  ],
  6 => [
      "fr" => "Juin",
      "en" => "June"
  ],
  7 => [
      "fr" => "Juillet",
      "en" => "July"
  ],
  8 => [
      "fr" => "Aout",
      "en" => "August"
  ],
  9 => [
      "fr" => "Septembre",
      "en" => "September"
  ],
  10 => [
      "fr" => "Octobre",
      "en" => "October"
  ],
  11 => [
      "fr" => "Novembre",
      "en" => "November"
  ],
  12 => [
      "fr" => "Decembre",
      "en" => "December"
  ]
];

afficheUnMois($mois, 3);
afficheUnMois($mois, 1);

foreach($mois as $key => $value) {
    echo $key." - ";
    echo $value["fr"]."<br>";
}

/** Les 6 premiers mois de l'année en anglais */
for($i = 1; $i <= 6; $i++) {
    echo $mois[$i]["en"]."<br>";
}

/** Les noms en français et en anglais du 3eme mois */
echo $mois[3]["fr"]."<br>".$mois[3]["en"]."<br>";

$moisEnFrancais = array();
for($i = 1;$i <= 12; $i++) {
    $moisEnFrancais[$i] = $mois[$i]["fr"];
}
//var_dump($moisEnFrancais);

$moisEnAnglais = array();
for($i = 1;$i <= 12; $i++) {
    $moisEnAnglais[] = $mois[$i]["en"];
}
// Equivalence :
for($i = 1;$i <= 12; $i++) {
    array_push($moisEnAnglais, $mois[$i]["en"]);
}
array_pop($moisEnAnglais); // Dépile à la fin
array_shift($moisEnAnglais); // Dépile au debut
array_unshift($moisEnAnglais, "Et mon janvier ? :'("); // Empile au debut
//var_dump($moisEnAnglais);

/* Ajout de mois dans d'autres langues */
$mois[1]["de"] = "Januar";
$mois[2]["de"] = "Februar";
$mois[3]["de"] = "März";
$mois[4]["de"] = "April";
$mois[5]["de"] = "Mai";
// et ainsi de suite ...
//var_dump($mois);



tousLesMois($mois);
tousLesMois($mois);
tousLesMois($mois);



?>
</body>
</html>
