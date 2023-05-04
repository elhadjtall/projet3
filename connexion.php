<?php

$is_invalid = false;

// La requette pour la base de donnée

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Inclure la base de donnée bdd dans le formulaire
    $mysqli = require __DIR__ . "/bdd.php";

    // sélectionne toutes les colonnes de la table "user" où l'adresse e-mail est égale à une valeur donnée fournie via la méthode POST d'un formulaire HTML.
    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    // Verification du mot de passe dans la base de donnée et accepter la connexion
    if($user) {
       if (password_verify($_POST["password"], $user["password_hash"])) {
        
        session_start();

        // Regenere l'identifiant de session en appelant la fonction cette fonction
        
        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];

        header("Location: index.php");
        exit;

       }
    }

    $is_invalid = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <h1>CONNEXION</h1>

    <!-- Cette fonction permet d'afficher l'invalidité de votre connexion -->
    <?php if ($is_invalid) : ?>
        <em>Connexion invalide</em>
    <?php endif; ?>
    
    <!-- fonction du formulaire de connexion -->
    <form action="" method="POST">
        <label for="email">VOTRE EMAIL</label>

        <!-- affiche la valeur du champ de formulaire d'adresse e-mail, tout en s'assurant que la valeur est correctement échappée pour éviter les attaques XSS. -->
        <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">VOTRE PASSWORD</label>
        <input type="password" name="password" id="password">

        <button>Connecter</button>

    </form>
</body>
</html>