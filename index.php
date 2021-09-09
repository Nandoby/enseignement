<?php
require 'connect_database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enseignement</title>
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

    if (isset($database)) {
        $sql = 'SELECT * FROM categories';
        if (isset($_GET['degree'])) {
            if ($_GET['degree'] == 'all') {
                $sql = 'SELECT * FROM categories';
            }
            if ($_GET['degree'] == '1') {
                $sql = 'SELECT * FROM categories WHERE degree = 1';
            }
            if ($_GET['degree'] == '2') {
                $sql = 'SELECT * FROM categories WHERE degree = 2';
            }
            if ($_GET['degree'] == '3') {
                $sql = 'SELECT * FROM categories WHERE degree = 3';
            }
        }
        $query = $database->query($sql);

        while ($data = $query->fetch()) : ?>
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
        $query->closeCursor();
    }
    ?>
</section>

<!-- Script -->
<script src="index.js"></script>
</body>
</html>