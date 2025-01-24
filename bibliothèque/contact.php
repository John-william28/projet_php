<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de Contact</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

    <div class="container">
        <h1>Contactez-nous</h1>
        <form action="#" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>

    <div class="footer-container">

    <br>
    <br>
    <br>
    <a href="accueil.php">Retour à l'accueil</a>
    <p>&copy; 2024 Chakou. Tous droits réservés.</p>
    </div>
</body>
</html>
