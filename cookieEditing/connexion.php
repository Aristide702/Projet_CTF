<?php
session_start();

if (isset($_SESSION['utilisateur'])) {
    if ($_SESSION["utilisateur"] == "admin")
        header("Location: index.php");
}

if (isset($_POST))
    extract($_POST);

$message = "";
if (isset($btSubmit))
    $message = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer !";

if (isset($btGuest)) {
    $_SESSION['utilisateur'] = "guest";
    header("Location: index.php");
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <p><?= $message ?></p>
    <form method="post">
        <div>
            <label for='uti_login'>Login</label>
            <input id='uti_login' name='uti_login' type='text' size='50' />
        </div>
        <div>
            <label for='uti_mdp'>Mot de passe</label>
            <input id='uti_mdp' name='uti_mdp' type='password' size='50' value='' />
        </div>
        <div>
            <input type="submit" name="btSubmit" value="Se connecter" />
        </div>
        <div>
            <input type="submit" name="btGuest" value="Continuer en tant qu'invité" />
        </div>
    </form>
</body>

</html>