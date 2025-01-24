<?php
//session_start();
require_once ('classes/User.php');

$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Récupération des champs du formulaire
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //Vérification des champs vides
    if (empty($username) || empty($password)) {
        $error = "Veuillez remplir tous les champs !";
    }else{

        if($user->register($username, $password)){
            $success = "Inscription réussie ! Vous pouvez vous connecter.";
        }else{
            $error = "Erreur lors de l'inscription";
        }
            //hashage du mot de passe {} 
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);

           //Préparation et exécution de la requête SQL
        //    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        //    $stmt->execute(['username', $username, 'password', $hashed_password]);
        //    $susccess = "Inscription réussie ! Vous pouvez vous connecter."; 
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>" ?>
    <?php if (isset($susccess)) echo "<p style='color: green;'>$success</p>" ?>
    <form action="register.php" method="POST">
        <input type="text" name="username" placehorder="nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit"> S'inscrire</button>
    </form>
    
    <footer>
        <div class="footer-container">

        <br>
        <br>
        <br>
        <a href="accueil.php">Retour à l'accueil</a>
        <p>&copy; 2024 Chakou. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>