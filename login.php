<?php
$clients = [
    [
        "email" => "monemail@test.com",
        "motdepasse" => "toto"
    ],
    [
        "email" => "mondeuxieme@test.com",
        "motdepasse" => "titi"
    ],
];
?>
<h5>Espace client</h5>
<form action="" method="POST">
    <input type="text" name="email" placeholder="e-mail" />
    <input type="text" name="pass" placeholder="mot de passe" />
    <input type="submit" value="valider" />
</form>