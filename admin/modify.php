<?php
session_start();


if (!isset($_SESSION['login'])) {
    header("LOCATION:index.php");
}
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
}
if (isset($_GET['success'])) {
    $success = 'Votre article a bien été modifié';
}

require '../connect_database.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Modification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">
</head>

<body>

<div class="container">

    <?php if (isset($success)) echo '<p class="alert alert-success">' . $success . '</p>' ?>

    <form action="treatmentModify.php?id=<?= $id ?>" method="POST">

        <?php
        $query = $database->prepare("SELECT * FROM categories WHERE id = ?");
        $query->execute([$id]);

        while ($data = $query->fetch()) : ?>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input class="form-control" type="text" id="nom" name="nom" value="<?= $data['name'] ?>">
            </div>

            <div class="mb-3">
                <label for="descript" class="form-label">Description</label>
                <input class="form-control" type="text" id="descript" name="descript"
                       value="<?= $data['description'] ?>">
            </div>

            <div class="mb-3">
                <label for="site" class="form-label">Site</label>
                <input class="form-control" type="text" id="site" name="site" value="<?= $data['site'] ?>">
            </div>

            <div class="mb-3">
                <label for="site" class="form-label">Ecole</label>
                <input class="form-control" type="text" id="site" name="ecole" value="<?= $data['ecole'] ?>">
            </div>
            <div class="mb-3">
                <select name="degree" class="form-select">
                    <option value="1" <?php if ($data['degree'] == 1) echo 'selected' ?>>1er degré</option>
                    <option value="2" <?php if ($data['degree'] == 2) echo 'selected' ?>>2ème degré</option>
                    <option value="3" <?php if ($data['degree'] == 3) echo 'selected' ?>>3ème degré</option>
                </select>
            </div>

            <input class="btn btn-warning" type="submit" value="Modifier">
            <a class="btn btn-secondary" href="sections.php">Retour</a>

        <?php endwhile;

        ?>


    </form>
</div>

</body>

</html>


