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
        $loggedInUser = $user->login($username, $password);

        if($loggedInUser){
            $_SESSION['username']= $loggedInUser['username'];
            header("Location: dashboard.php");
            exit();
        }else{
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
            
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>" ?>
    <form action="login.php" method="POST">
        <input type="text" name="username" placehorder="nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit"> Se connecter</button>
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