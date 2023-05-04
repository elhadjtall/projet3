<?php
// Verification des champs
if (empty($_POST['nom'])){
    die ("Le nom est requis");
}
// Validation de email
if ( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    die("Valider votre Email");
}
// La longueur du mot de passe
if (strlen($_POST['password']) < 8) {
    die ("Le mot de passe est trop court");
}

// Le mot de passe dois contenir une lettre
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die ("Le mot de passe doit contenir au moins une lettre");
}

// Le mot de passe doit contenir un chiffre
if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
    die ("Le mot de passe doit contenir au moins un nombre");
}

// Confirmation du mot de passe

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("le mot de passe doit correspondre");
}
// Hassage du mot de passe

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/bdd.php";
//  Insertion des donnnées dans la base de données

$sql = "INSERT INTO user (nom, email, password_hash) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["nom"],
                  $_POST["email"],
                  $password_hash);
if ($stmt->execute()) {
    header("Location: inscription-succes.html");
} else {
    if ($mysqli->errno === 1062) {
        die("courriel déjà reçu");
    }else{
        die($mysqli->error ." " . $mysqli->errno);
    }
    
} 
 ?>