<?php
session_start();

if (!isset($_POST['nom'])) {
    header("LOCATION:index.php");
}
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
}
require '../connect_database.php';

if (isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
}
if (isset($_POST['descript'])) {
    $descript = htmlspecialchars($_POST['descript']);
}
if (isset($_POST['site'])) {
    $site = htmlspecialchars($_POST['site']);
}
if (isset($_POST['degree'])) {
    $degree = $_POST['degree'];
}
if (isset($_POST['ecole'])) {
    $ecole = htmlspecialchars($_POST['ecole']);
}

$update = $database->prepare(
    '
UPDATE categories
SET name = :nom, description = :desc, site = :site, ecole = :ecole, degree = :degree
WHERE id = :id');

$update->execute([
    "nom" => $nom,
    "desc" => $descript,
    "site" => $site,
    "ecole" => $ecole,
    "degree" => $degree,
    "id" => $id
]);

header("LOCATION:modify.php?success=ok&id=" . $id);

