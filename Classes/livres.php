<?php
//session_start();

if (!isset($_SESSION['utilisateurs_id'])) {
   header("Location: login.php");
}
$utilisateurs_id = $_SESSION['utilisateurs_id'];

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
   echo "Livre non trouvé.";
   exit();
}
$livres_id = $_GET['id'];
// Récupérer les détails du livre
function getlivresDetails($livres_id) {
   global $pdo;
   $stmt = $pdo->prepare("SELECT id, title, author, description FROM livres WHERE id = ?");
   $stmt->execute([$livres_id]);
   return $stmt->fetch();
}

function isFavorite($utilisateurs_id, $livres_id) {
   global $pdo;
   $stmt = $pdo->prepare("SELECT COUNT(*) FROM favorites WHERE utilisateurs_id = ? AND livres_id = ?");
   $stmt->execute([$utilisateurs_id, $livres_id]);
   return $stmt->fetchColumn() > 0;
}

if (isset($_GET['add'])) {
   $stmt = $pdo->prepare("INSERT INTO favorites (utilisateurs_id, livres_id) VALUES (?, ?)");
   $stmt->execute([$utilisateurs_id, $livres_id]);
   header("Location: livres.php?id=$livres_id");
   exit();
}

if (isset($_GET['remove'])) {
   $stmt = $pdo->prepare("DELETE FROM favorites WHERE utilisateurs_id = ? AND livres_id = ?");
   $stmt->execute([$utilisateurs_id, $livres_id]);
   header("Location: livres.php?id=$livres_id");
   exit();
}

$livres = getlivresDetails($livres_id);

$isFavorite = isFavorite($utilisateurs_id, $livres_id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Détails du Livre</title>
</head>
<body>
<h1>Détails du Livre</h1>
<?php if ($livres): ?>
<h2><?php echo htmlspecialchars($livres['title']); ?></h2>
<p><strong>Auteur :</strong> <?php echo htmlspecialchars($livres['author']); ?></p>
<p><strong>Description :</strong> <?php echo nl2br(htmlspecialchars($livres['description'])); ?></p>
<?php if ($isFavorite): ?>
<a href="livres.php?id=<?php echo $livres_id; ?>&remove=true">Retirer des favoris</a>
<?php else: ?>
<a href="livres.php?id=<?php echo $livres_id; ?>&add=true">Ajouter aux favoris</a>
<?php endif; ?>
<?php else: ?>
<p>Le livre n'existe pas.</p>
<?php endif; ?>
</body>
</html>