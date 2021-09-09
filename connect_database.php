<?php
try {
    $database = new PDO('mysql:host=localhost; dbname=enseignement; charset=utf8', 'root', 'root',
        [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

