<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("LOCATION:index.php");
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    require "../connect_database.php";
}

$query = $database->prepare("DELETE FROM categories WHERE id = ?");
$query->execute([$id]);
$query->closeCursor();
header("LOCATION:sections.php?delete=ok");
