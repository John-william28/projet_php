<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bibliothèque Locale</h1> <br>
        <nav>
            <a href="register.php">Inscription</a>
            <a href="login.php">Connexion</a>
            <a href="contact.php">Contact</a>
        </nav>

        <div class="search-container">
        <h2>Recherche</h2>
        <form action="#" method="GET">
            <input type="text" id="search" name="search" placeholder="Entrez votre recherche...">
            <button type="submit" class="search-btn">Rechercher</button>
        </form>
    </div>
    </header>
    <main>
        <br><br>
        <h2>Liste des Livres</h2>
        <ul id="book-list">
            <li>
                <span>Père Riche Père Pauvre</span>
                <form action="add_to_favorites.php" method="POST" class="favorite-form">
                    <input type="hidden" name="book_title" value="Père Riche Père Pauvre">
                    <button type="submit">Ajouter aux favoris</button>
                </form>
            </li>
            <li>
                <span>Landy et Johan</span>
                <form action="add_to_favorites.php" method="POST" class="favorite-form">
                    <input type="hidden" name="book_title" value="Landy et Johan">
                    <button type="submit">Ajouter aux favoris</button>
                </form>
            </li>
            <li>
                <span>La belle et la bête</span>
                <form action="add_to_favorites.php" method="POST" class="favorite-form">
                    <input type="hidden" name="book_title" value="La belle et la bête">
                    <button type="submit">Ajouter aux favoris</button>
                </form>
            </li>
            <li>
                <span>Le Petit Chaperon Rouge</span>
                <form action="add_to_favorites.php" method="POST" class="favorite-form">
                    <input type="hidden" name="book_title" value="Le Petit Chaperon Rouge">
                    <button type="submit">Ajouter aux favoris</button>
                </form>
            </li>
            <li>
                <span>Shaman est insociable</span>
                <form action="add_to_favorites.php" method="POST" class="favorite-form">
                    <input type="hidden" name="book_title" value="Shaman est insociable">
                    <button type="submit">Ajouter aux favoris</button>
                </form>
            </li>
        </ul>
    </main>
    <footer>
        <p>&copy; 2024 Bibliothèque Locale. Tous droits réservés.</p>
    </footer>
</body>
</html>
