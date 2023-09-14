<?php
    session_name('abdeleatifi');
    session_start ();
    require_once('condb.php');
    
    if (isset($_SESSION['username']) && isset($_SESSION['code'])) 
    {
        try{
            



            $requete1=$db->prepare("UPDATE projet SET titre=?,resume=?, description=? ,motcle=? WHERE id_projet=?");
            $requete1->bindValue(1,$_POST['titre_projet'],PDO::PARAM_STR);
            $requete1->bindValue(2,$_POST['resume_projet'],PDO::PARAM_STR);
            $requete1->bindValue(3,$_POST['description_projet'],PDO::PARAM_STR);
            $requete1->bindValue(4,$_POST['motcle'],PDO::PARAM_STR);
            $requete1->BindParam(5,$_POST['ghirid'],PDO::PARAM_INT);
            $requete1->execute();
        


            // // /***********************************Insertion membre d'équipe****************************************************/

            $requete7=$db->prepare("SELECT count(id_membre) FROM membre_equipe where id_projet=:id ");
            $requete7->BindParam(':id',$_POST['ghirid'],PDO::PARAM_INT);
            $requete7->execute();
            $nbre=$requete7->fetch(PDO::FETCH_ASSOC);
            $k=1;

            while(!empty($_POST['nom_eq'.$k])){


                if($k<=$nbre['count(id_membre)']){
                
                    $requete4=$db->prepare("UPDATE membre_equipe  SET civilite=?,nom=?,prenom=?,mail=?,tel=?,structure_de_recherche=?,grade=?,specialite=?,taches=? WHERE  mail=?");
                    $requete4->bindValue(1,$_POST['sexe_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(2,$_POST['nom_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(3,$_POST['prenom_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(4,$_POST['email_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(5,$_POST['teleph_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(6,$_POST['structure_recherche_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(7,$_POST['grade_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(8,$_POST['specialite_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(9,$_POST['tache'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(10,$_POST['email_eq'.$k],PDO::PARAM_STR);
                    $requete4->execute();
                    $k+=1;

                }else{

                    $requete4=$db->prepare("INSERT INTO membre_equipe (id_membre,civilite,nom,prenom,mail,tel,structure_de_recherche,grade,specialite,taches,id_projet)
                    VALUES(NULL,?,?,?,?,?,?,?,?,?,?)");
                    $requete4->bindValue(1,$_POST['sexe_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(2,$_POST['nom_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(3,$_POST['prenom_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(4,$_POST['email_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(5,$_POST['teleph_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(6,$_POST['structure_recherche_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(7,$_POST['grade_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(8,$_POST['specialite_eq'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(9,$_POST['tache'.$k],PDO::PARAM_STR);
                    $requete4->bindValue(10,$_POST['ghirid'],PDO::PARAM_STR);
                    $requete4->execute();

                    $k+=1;

                }
               
            }


            // // //  /***********************************Production scientifique****************************************************/
            

            $requete9=$db->prepare("SELECT count(id_publication) FROM pcontientp where id_projet=:id ");
            $requete9->BindParam(':id',$_POST['ghirid'],PDO::PARAM_INT);
            $requete9->execute();
            $nbrep=$requete9->fetch(PDO::FETCH_ASSOC);
            $j=1;

            while(!empty($_POST['titreComplet'.$j])){

                  
                if($j<=$nbrep['count(id_publication)']){

                    $requete8=$db->prepare("UPDATE publication SET titre=?,nom_periode=?,auteurs=?,volume=?,issus=?,pages=?,annee=?,basedonnee=?,thematique=?,lienweb=? WHERE titre=?");
                    $requete8->bindValue(1,$_POST['titreComplet'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(2,$_POST['perioSC'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(3,$_POST['auteurs_prod'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(4,$_POST['volume'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(5,$_POST['issus'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(6,$_POST['page'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(7,$_POST['annee'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(8,$_POST['base_donnee_facteur'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(9,$_POST['theme_prod'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(10,$_POST['lien'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(11,$_POST['titreComplet'.$j],PDO::PARAM_STR);
                    $requete8->execute();
                    $j+=1;

                }else{

                    $requete8=$db->prepare("INSERT INTO publication(id_publication,titre,nom_periode,auteurs,volume,issus,pages,annee,basedonnee,thematique,lienweb)
                    VALUES(NULL,?,?,?,?,?,?,?,?,?,?)");
                    $requete8->bindValue(1,$_POST['titreComplet'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(2,$_POST['perioSC'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(3,$_POST['auteurs_prod'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(4,$_POST['volume'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(5,$_POST['issus'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(6,$_POST['page'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(7,$_POST['annee'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(8,$_POST['base_donnee_facteur'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(9,$_POST['theme_prod'.$j],PDO::PARAM_STR);
                    $requete8->bindValue(10,$_POST['lien'.$j],PDO::PARAM_STR);
                    $requete8->execute();

                    $geter23=$db->prepare("SELECT id_publication FROM publication WHERE titre=?");
                    $geter23->BindValue(':titre',$_POST['titreComplet'.$j],PDO::PARAM_STR);
                    $geter23->execute();
                    $stm23=$geter23->fetch(PDO::FETCH_ASSOC); 
                    
                    $requete23=$db->prepare("INSERT INTO pcontientp (id_projet,id_publication) VALUES (?,?)");
                    $requete23->BindValue(1,$_POST['ghirid'],PDO::PARAM_INT);
                    $requete23->BindValue(2,$stm23['id_publication'],PDO::PARAM_INT);
                    $requete23->execute();
                    $j+=1;
                }
            }

            // // // /**********************************Insertion  de communication******************************************************/


            $requete11=$db->prepare("SELECT count(id_communication) FROM pcontientc where id_projet=:id ");
            $requete11->BindParam(':id',$_POST['ghirid'],PDO::PARAM_INT);
            $requete11->execute();
            $nbrec=$requete11->fetch(PDO::FETCH_ASSOC);
            $s=1;

            while(!empty($_POST['communication'.$s])){


                if($s<=$nbrec['count(id_communication)']){

                    $requete3=$db->prepare("UPDATE communication SET titre=?,auteurs=?,nomrencontre=?,lieu=?,date=?,thematique=?,lienweb=?
                        WHERE titre=?");
                    $requete3->bindValue(1,$_POST['communication'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(2,$_POST['auteurs'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(3,$_POST['nom_renc'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(4,$_POST['lieu'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(5,$_POST['date_rencontre'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(6,$_POST['them_renc'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(7,$_POST['lienweb_renc'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(8,$_POST['communication'.$s],PDO::PARAM_STR);
                    $requete3->execute();
                    $s+=1;

                }else{

                    $requete3=$db->prepare("INSERT INTO communication(id_communication,titre,auteurs,nomrencontre,lieu,date,thematique,lienweb)
                    VALUES(NULL,?,?,?,?,?,?,?)");
                    $requete3->bindValue(1,$_POST['communication'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(2,$_POST['auteurs'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(3,$_POST['nom_renc'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(4,$_POST['lieu'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(5,$_POST['date_rencontre'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(6,$_POST['them_renc'.$s],PDO::PARAM_STR);
                    $requete3->bindValue(7,$_POST['lienweb_renc'.$s],PDO::PARAM_STR);
                    $requete3->execute();

                    $geter231=$db->prepare("SELECT id_communication FROM `communication` WHERE titre=:titre");
                    $geter231->BindValue(':titre',$_POST['communication'.$s],PDO::PARAM_STR);
                    $geter231->execute();
                    $stm231=$geter231->fetch(PDO::FETCH_ASSOC);
                    
                    $requete231=$db->prepare("INSERT INTO pcontientc (id_projet,id_communication) VALUES (?,?)");
                    $requete231->BindValue(1,$_POST['ghirid'],PDO::PARAM_INT);
                    $requete231->BindValue(2,$stm231['id_communication'],PDO::PARAM_INT);
                    $requete231->execute();
                    $s+=1;
                }
            
                
            }

            // //********************************************Fin  de communication******************************************************/


          //************************************************Modification de la these************************************************* */


            $requete13=$db->prepare("SELECT count(id_these) FROM pcontientt where id_projet=:id ");
            $requete13->BindParam(':id',$_POST['ghirid'],PDO::PARAM_INT);
            $requete13->execute();
            $nbret=$requete13->fetch(PDO::FETCH_ASSOC);
            $i=1;

            while(!empty($_POST['titreTh'.$i])){

                  

                if($i<=$nbret['count(id_these)']){

                    $requete7=$db->prepare("UPDATE these SET titre=?,etablissement=?,fonction=?,thematique=?,date=?,auteur=? WHERE titre=?");
                    $requete7->bindValue(1,$_POST['titreTh'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(2,$_POST['ville'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(3,$_POST['fonction_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(4,$_POST['thematique_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(5,$_POST['date_soutenance'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(6,$_POST['auteur_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(7,$_POST['titreTh'.$i],PDO::PARAM_STR);
                    $requete7->execute();
                    $i+=1;

                }else{

                    $requete7=$db->prepare("INSERT INTO these(id_these,titre,etablissement,fonction,thematique,date,auteur) VALUES(NULL,?,?,?,?,?,?)");
                    $requete7->bindValue(1,$_POST['titreTh'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(2,$_POST['etabville'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(3,$_POST['fonction_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(4,$_POST['thematique_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(5,$_POST['date_soutenance'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(6,$_POST['auteur_these'.$i],PDO::PARAM_STR);
                    $requete7->execute();

                    $geter232=$db->prepare("SELECT id_these FROM these WHERE titre=:titre");
                    $geter232->BindValue(':titre',$_POST['titreTh'.$i],PDO::PARAM_STR);
                    $geter232->execute();
                    $stm232=$geter232->fetch(PDO::FETCH_ASSOC);

                    $requete232=$db->prepare("INSERT INTO pcontientt (id_projet,id_these) VALUES (?,?)");
                    $requete232->BindValue(1,$_POST['ghirid'],PDO::PARAM_INT);
                    $requete232->BindValue(2,$stm232['id_these'],PDO::PARAM_INT);
                    $requete232->execute();
                    $i+=1;
                    
                }
            }
            header('location:profile.php');
            
           
        }
    
        catch (PDOException $e){
            echo "ERROR : ".$e->getMessage();
            die();
        }
    }else{
        header('location:profile.php');
    }