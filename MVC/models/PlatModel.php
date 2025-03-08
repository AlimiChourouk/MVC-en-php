<?php
require_once (__DIR__ .'/../config/db.php');

function getAllPlats() {
    global $pdo;
    $sql = "SELECT * FROM plat";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}
?>