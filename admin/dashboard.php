<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("LOCATION:index.php");
}

if (isset($_GET['deco'])) {
    session_destroy();
    header("LOCATION:index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-5 text-center">Tableau de bord</h1>
    <a class="btn btn-primary me-2" href="sections.php">Afficher les sections</a>
    <a class="btn btn-secondary" href="dashboard.php?deco=ok">Déconnexion</a>
</div>
</body>
</html>
