<?php
$pdo = new PDO("mysql:host = localhost; dbname=entreprise;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$error = null;
try{

    $statment = $pdo->query("SELECT * from employes");




    
    
}catch( PDOException $e){
$error = $e->getMessage();
}
?>