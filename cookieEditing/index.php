<?php
session_start();;
if ($_SESSION == [])
    header("Location: connexion.php");

$flag = "";
if (isset($_SESSION['utilisateur'])) {
    if ($_SESSION['utilisateur'] == "admin")
        $flag = "Flag{C00K1€SE$$10N}";
    else
        $flag = "";
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>Bienvenue <?= $_SESSION['utilisateur'] ?></h1>
    <h2><?= $flag ?></h2>

</body>

</html>