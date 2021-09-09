<?php
session_start();
if(!isset($_SESSION['login'])){
    header("LOCATION:index.php");
}
if(isset($_GET['nom'])){
    $error = 'Le nom ne peut pas être manquant';
}
if(isset($_GET['description'])) {
    $error = 'La description ne peut pas être manquante';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Ajouter un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container w-75">
    <h1 class="mt-3">Ajouter un nouvel article</h1>
    <?php if (isset($error)) echo '<p class="alert alert-warning">' . $error . '</p>' ?>
    <form action="treatmentAdd.php" class="mt-5" method="POST">

        <div class="mb-3">
            <label class="form-label" for="nom">Nom : </label>
            <input class="form-control" id="nom" name="nom" type="text">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description : </label>
            <input class="form-control" id="description" name="description" type="text">
        </div>

        <div class="mb-3">
            <label class="form-label" for="site">Site web :</label>
            <input class="form-control" id="site" name="site" type="text">
        </div>

        <div class="mb-3">
            <label class="form-label" for="ecole">Ecole :</label>
            <input class="form-control" id="ecole" name="ecole" type="text">
        </div>

        <div class="mb-3">
            <label class="form-label" for="degree">Degré :</label>
            <select class="form-select" id="degree" name="degree">
                <option value="1">1er degré</option>
                <option value="2">2ème degré</option>
                <option value="3">3ème degré</option>
            </select>
        </div>
        <input class="btn btn-success" type="submit" value="Ajouter">
        <a class="btn btn-secondary" href="sections.php">Retour aux sections</a>
    </form>
</div>
</body>
</html>