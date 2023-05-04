<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>INSCRIPTION</title>
</head>
<body>
    <h1>S'Inscrire</h1>

    <form action="traitement.php"  method="POST"  novalidate>
    <div>
        <label for="name">VOTRE NOM</label>
        <input type="text" name="nom" placeholder="Votre nom">
    </div>

    <div>
        <label for="email">VOTRE EMAIL</label>
        <input type="email" name="email" id="email" placeholder="Votre email">
    </div>
    
    <div>
        <label for="password">VOTRE MOT DE PASSE</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
    </div>
    <div>
        <label for="password_confirmation">CONFIRMER LE MOT DE PASSE</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <button type="submit">S'inscrire</button>
    </form>
</body>
</html>