<?php
require_once (__DIR__ .'/../config/db.php');

function getEvenement(){
    global $pdo;

    $sql = "SELECT 
        ed.editionId,
        ed.dateEvent,
        ed.timeEvent,
        ed.NumSalle,
        ed.image,
        ev.eventId,
        ev.eventType,
        ev.eventTitle,
        ev.eventDescriptio,
        ev.TariffNormal,
        ev.TariffReduit
    FROM edition ed
    INNER JOIN evenement ev ON ed.eventId = ev.eventId";

    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>