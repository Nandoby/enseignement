<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    header("LOCATION:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Enseignement</h1>
</header>
<nav>
    <ul>
        <li><a href="index.php?degree=all">Tous les degrés</a></li>
        <li><a href="index.php?degree=1">1er degré</a></li>
        <li><a href="index.php?degree=2">2eme degré</a></li>
        <li><a href="index.php?degree=3">3eme degré</a></li>
    </ul>
    <form action="search.php" method="GET">
        <input type="text" placeholder="Rechercher..." name="search">
        <input type="submit" value="OK">
    </form>
</nav>
<section id="sections">
    <?php
    require 'connect_database.php';
    $query = $database->prepare('SELECT * FROM categories WHERE name LIKE :name');
    $query->execute([
        ":name" => "%" . $search . "%"
    ]);
    $count = $query->rowCount();
    if ($count <= 0) {
        $error = '<p class="error">Aucun résultat...</p>';
    }
    if (isset($error)) {
        echo $error;
    }
    while ($data = $query->fetch()):?>
        <div class="section_container">
            <h2 class="title"><?= $data['name'] ?></h2>
            <p class="description"><?= $data['description'] ?></p>
        </div>
        <div class="modal" aria-modal="false">
            <h2><?= $data['name'] ?></h2>
            <p>Ecole : <?=$data['ecole']?> - Site : <a href="<?=$data['site']?>"><?=$data['site']?></a></p>
            <button>Fermer</button>
        </div>
        <div class="modal-overlay"></div>
    <?php endwhile;
    ?>
</section>
</body>

<script src="index.js"></script>
</html>

