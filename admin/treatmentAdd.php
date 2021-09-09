<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("LOCATION:index.php");
    exit();
}
if (isset($_POST['nom'])) {
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
    } else {
        header("LOCATION:add.php?nom=false");
        exit();
    }
}

if (isset($_POST['description'])) {
    if (!empty($_POST['description'])) {
        $description = htmlspecialchars($_POST['description']);
    } else {
        header("LOCATION:add.php?description=false");
        exit();
    }
}

if (isset($_POST['site'])) {
    $site = htmlspecialchars($_POST['site']);
}
if (isset($_POST['ecole'])) {
    $ecole = htmlspecialchars($_POST['ecole']);
}
if (isset($_POST['degree'])) {
    $degree = htmlspecialchars($_POST['degree']);
}

require '../connect_database.php';

$query = $database->prepare('INSERT INTO categories (name, description,site,degree, ecole) VALUES (:nom, :description, :site, :degree, :ecole)');
$query->execute([
    "nom" => $nom,
    "description" => $description,
    "site" => $site,
    "degree" => $degree,
    "ecole" => $ecole
]);
header("LOCATION:sections.php?added=true");

