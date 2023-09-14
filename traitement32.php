<?php
require_once('condb.php');
if(!empty($_POST['userfor']) && !empty($_POST['codefor'])){
            $req=$db->prepare("UPDATE compte SET mdp = ? WHERE compte.mail = ?");
            $req->BindValue(1,$_POST['codefor'],PDO::PARAM_STR);
            $req->BindValue(2,$_POST['userfor'],PDO::PARAM_STR);
            $req->execute();
            header('location:index.php');
}else{
    header('location:connecter.php');
}