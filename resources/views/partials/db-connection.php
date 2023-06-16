
<?php
header('content-type: application/Json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
    $pdo = new PDO ("mysql:dbname=mrwhiskers2;host=localhost","root","");
    $sentenciaSQL = $pdo->prepare("SELECT * FROM eventos;");
    $sentenciaSQL->execute();
    $resultado=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>    