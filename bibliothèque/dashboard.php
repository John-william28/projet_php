<?php
//session_start();
//require_once 'db.php';

if(!isset($_SESSION['utilisateur_id'])){
    header('location:login.php');
    exit();
}


$username = $_SESSION['utilisateur_id']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);

    if (!empty($title) && !empty($author)) {
        $sql = "INSERT INTO books (title, author, utilisateur_id) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $author, $utilisateur_id]);
        $message = "Livre ajouté avec succès !";
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}


$mariaDB = "SELECT books.id, books.title, books.author 
        FROM books 
        INNER JOIN favorites ON books.id = favorites.book_id 
        WHERE favorites.utilisateur_id = ?";
$stmt = $pdo->prepare($mariaDB);
$stmt->execute([$utilisateur_id]);
$favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Bienvenue <?php echo $_SESSION['utilisateur_id']?></h1>
            <a href="logout.php">Déconnexion</a>
            <a href="accueil.php">Retour à l'accueil</a>
    </header>

    <main>

        <section id="my-favorites">
            <h2>Mes Favoris</h2>
            <div id="favorites-list"></div>
        </section>

        <section id="my-favorites">
            <h2>Mes Favoris</h2>
            <?php if (empty($favorites)): ?>
            <p>Aucun favori trouvé.</p>
            <?php else: ?>
            <ul>
                <?php foreach ($favorites as $favorite): ?>
                <li>
                <strong><?php echo htmlspecialchars($favorite['title']); ?></strong>
                <em><?php echo htmlspecialchars($favorite['author']); ?></em>
                </li>
                <?php endforeach; ?>
            </ul>
                <?php endif; ?>
        </section>

        
         <section id="add-book">
            <h2>Ajouter un Livre</h2>
            <?php if (!empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="dashboard.php" method="POST">
                <div class="form-group">
                    <label for="title">Titre du livre :</label>
                    <input type="text" id="title" name="title" placeholder="Entrez le titre" required>
                </div>
                <div class="form-group">
                    <label for="author">Auteur du livre :</label>
                    <input type="text" id="author" name="author" placeholder="Entrez l'auteur" required>
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </section>

        <!-- Section pour afficher les livres ajoutés par l'utilisateur -->
        <section id="my-books">
            <h2>Mes Livres</h2>
            <?php if (empty($my_books)): ?>
                <p>Aucun livre ajouté.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($my_books as $book): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($book['title']); ?></strong>
                            <em><?php echo htmlspecialchars($book['author']); ?></em>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

    </main>
</body>
</html>