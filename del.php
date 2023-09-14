<?php
     require_once('condb.php');
     session_name('abdeleatifi');
    session_start ();
if (isset($_SESSION['username']) && isset($_SESSION['code'])) {
    $titre=$_GET['titre'];


    $stm1=$db->prepare("SELECT id_projet FROM projet WHERE titre=:titre");
    $stm1->BindParam(':titre',$titre,PDO::PARAM_STR);
    $stm1->execute();
    $tab1=$stm1->fetch(PDO::FETCH_ASSOC);


    $stm2=$db->prepare("SELECT id_communication FROM pcontientc WHERE id_projet=:id");
    $stm2->BindParam(':id',$tab1['id_projet'],PDO::PARAM_INT);
    $stm2->execute();
    $tab2=$stm2->fetchAll(PDO::FETCH_ASSOC);
    $sizc=sizeof($tab2);
    for($i=0;$i<$sizc;$i++){
        $stm21=$db->prepare("DELETE FROM pcontientc WHERE id_projet=:idp AND id_communication=:idc");
        $stm21->BindParam(':idp',$tab1['id_projet'],PDO::PARAM_INT);
        $stm21->BindParam(':idc',$tab2[$i]['id_communication'],PDO::PARAM_INT);
        $stm21->execute();
        $stm22=$db->prepare("DELETE FROM communication WHERE id_communication=:idct");
        $stm22->BindParam(':idct',$tab2[$i]['id_communication'],PDO::PARAM_INT);
        $stm22->execute();
    }



    $stm3=$db->prepare("SELECT id_publication FROM pcontientp WHERE id_projet=:id");
    $stm3->BindParam(':id',$tab1['id_projet'],PDO::PARAM_INT);
    $stm3->execute();
    $tab3=$stm3->fetchAll(PDO::FETCH_ASSOC);
    $sizp=sizeof($tab3);
    for($i=0;$i<$sizp;$i++){
        $stm31=$db->prepare("DELETE FROM pcontientp WHERE id_projet=:idp AND id_publication=:idc");
        $stm31->BindParam(':idp',$tab1['id_projet'],PDO::PARAM_INT);
        $stm31->BindParam(':idc',$tab3[$i]['id_publication'],PDO::PARAM_INT);
        $stm31->execute();
        $stm32=$db->prepare("DELETE FROM publication WHERE id_publication=:idct");
        $stm32->BindParam(':idct',$tab3[$i]['id_publication'],PDO::PARAM_INT);
        $stm32->execute();
    }



    $stm4=$db->prepare("SELECT id_these FROM pcontientt WHERE id_projet=:id");
    $stm4->BindParam(':id',$tab1['id_projet'],PDO::PARAM_INT);
    $stm4->execute();
    $tab4=$stm4->fetchAll(PDO::FETCH_ASSOC);
    $sizt=sizeof($tab4);
    for($i=0;$i<$sizt;$i++){
        $stm41=$db->prepare("DELETE FROM pcontientt WHERE id_projet=:idp AND id_these=:idc");
        $stm41->BindParam(':idp',$tab1['id_projet'],PDO::PARAM_INT);
        $stm41->BindParam(':idc',$tab4[$i]['id_these'],PDO::PARAM_INT);
        $stm41->execute();
        $stm42=$db->prepare("DELETE FROM these WHERE id_these=:idct");
        $stm42->BindParam(':idct',$tab4[$i]['id_these'],PDO::PARAM_INT);
        $stm42->execute();

    }


    $stmm=$db->prepare("DELETE FROM membre_equipe WHERE id_projet=:mbm");
    $stmm->BindParam(':mbm',$tab1['id_projet'],PDO::PARAM_STR);
    $stmm->execute();




    $stm=$db->prepare("DELETE FROM projet WHERE titre=:titre");
    $stm->BindParam(':titre',$titre,PDO::PARAM_STR);
    $stm->execute();



    header('location:profile.php');
}else{
    header('location:connecter.php');
}