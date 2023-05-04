<?php

session_start();
if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/bdd.php";

    $sql = "SELECT * FROM user 
            WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCEUIL</title>
</head>
<body>


    <h1>ACCEUIL</h1>


    <?php if (isset($user)): ?>

        <p>Bonjour <?= htmlspecialchars($user["nom"]) ?></p>

        <p><a href="deconnexion.php">Deconnexion</a></p>

    <?php else: ?>

        <!-- Afficher les liens des pages de connexion et d'inscription -->
        <p><a href="connexion.php"> Se connecter</a> or <a href="inscription.php">Inscrivez Vous</a></p>
    
    <!-- fermer la fonction du php -->
    <?php endif; ?>
</body>
</html>