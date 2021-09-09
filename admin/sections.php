<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("LOCATION:index.php");
}

require '../connect_database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<a class="btn btn-success" href="dashboard.php">Retour à Admin</a>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Site web</th>
        <th>Ecole</th>
        <th>Degré</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sections = $database->query("SELECT * FROM categories");
    while ($data = $sections->fetch()) {
        echo '<tr>';
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . $data['name'] . '</td>';
        echo '<td>' . $data['description'] . '</td>';
        echo '<td>' . $data['site'] . '</td>';
        echo '<td>' . $data['ecole'] . '</td>';
        echo '<td>' . $data['degree'] . '</td>';
        echo '<td>';
            echo '<a class="btn btn-warning me-3" href="modify.php">Modifier</a>';
            echo '<a class="btn btn-danger" href="delete.php">Supprimer</a>';
        echo '</td>';

        echo '</tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>