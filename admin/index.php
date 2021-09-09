<?php
session_start();
if (isset($_SESSION['login'])) {
    header("LOCATION:dashboard.php");
}
if (isset($_POST['username'])) {
    if (empty($_POST['username']) or empty($_POST['password'])) {
        $error = "Error";
    } else {
        require "../connect_database.php";
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        $login = $database->prepare("SELECT * FROM admin WHERE login = ?");
        $login->execute([$username]);

        if ($don = $login->fetch()) {
            var_dump($don);
            if (password_verify($password, $don['password'])) {
                $_SESSION['login'] = $don['login'];
                $_SESSION['id'] = $don['id']; // pour exemple
                header("LOCATION:dashboard.php");
            }
        } else {
            $error = "Votre login n'existe pas";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="index.php" method="POST">
        <div class="mb-3">
            <label class="form-label" for="login">Login: </label>
            <input class="form-control" type="text" name="username" id="login">
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp">Mot de passe: </label>
            <input class="form-control" type="password" name="password" id="mdp">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Envoyer">
        </div>
    </form>
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
</div>
</body>
</html>

