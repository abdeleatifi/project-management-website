<?php

require('condb.php');
session_name('abdeleatifi');
session_start ();
$compte=$_POST['username'];
$password=$_POST['code'];
$req="SELECT nom,role FROM compte WHERE mail=:mail AND mdp=:mdp";
$stm=$db->prepare($req);
$stm->bindParam(':mail',$compte,PDO::PARAM_STR);
$stm->bindParam(':mdp',$password,PDO::PARAM_STR);
$stm->execute();
$qes=$stm->fetch(PDO::FETCH_ASSOC);
if($qes['nom']){
    $_SESSION['username'] = $compte;
    $_SESSION['code'] = $password;
    
    header ('location: profile.php');
}else{
    header ('location: connecter.php');
}
