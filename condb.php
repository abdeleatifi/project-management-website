<?php
$dns="mysql:host=localhost;dbname=database_minipro";
$user="root";
$pass="";
try{
    $db=new PDO($dns,$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo 'erreur tma  '.$e->getMessage();
}


?>