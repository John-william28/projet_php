<?php
// session_start();


if (!isset($_SESSION['utilisateurs_id'])) {
   header("Location: login.php");
   exit();
}
$user_id = $_SESSION['utilisateurs_id'];

function getFavorites($utilisateurs_id) {
   global $pdo;
   $stmt = $pdo->prepare("SELECT livres.id, livres.title, livres.author
                          FROM livres
                          JOIN favorites ON livres.id = favorites.livres_id
                          WHERE favorites.utilisteurs_id = ?");
   $stmt->execute([$utilisateurs_id]);
   return $stmt->fetchAll();
}
// Ajouter un livre aux favoris
if (isset($_GET['add'])) {
   $book_id = $_GET['add'];
   $stmt = $pdo->prepare("INSERT INTO favorites (utilisateur_id, livres_id) VALUES (?, ?)");
   $stmt->execute([$utilisateurs_id, $livres_id]);
   header("Location: favorites.php");
   exit();
}

if (isset($_GET['remove'])) {
   $book_id = $_GET['remove'];
   $stmt = $pdo->prepare("DELETE FROM favorites WHERE utilisateurs_id = ? AND livres_id = ?");
   $stmt->execute([$utilisateurs_id, $livres_id]);
   header("Location: favorites.php");
   exit();
}

$favorites = getFavorites($utilisateurs_id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mes Favoris</title>
</head>
<body>
<h1>Mes Livres Favoris</h1>
<h2>Liste des livres favoris</h2>
<ul>
<?php foreach ($favorites as $favorite): ?>
<li>
<?php echo htmlspecialchars($favorite['title']) . " par " . htmlspecialchars($favorite['author']); ?>
<a href="favorites.php?remove=<?php echo $favorite['id']; ?>">Retirer des favoris</a>
</li>
<?php endforeach; ?>
</ul>
<h2>Ajouter un livre aux favoris</h2>
<ul>
<?php
      
       $stmt = $pdo->prepare("SELECT id, title, author FROM livres WHERE id NOT IN (SELECT livres_id FROM favorites WHERE utilisateurs_id = ?)");
       $stmt->execute([$utilisateurs_id]);
       $livres = $stmt->fetchAll();
       foreach ($livres as $livre): ?>
<li>
<?php echo htmlspecialchars($livre['title']) . " par " . htmlspecialchars($livre['author']); ?>
<a href="favorites.php?add=<?php echo $livre['id']; ?>">Ajouter aux favoris</a>
</li>
<?php endforeach; ?>
</ul>
</body>
</html>