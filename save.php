    <?php
    session_name('abdeleatifi');
    session_start ();
    require_once('condb.php');
    if (isset($_SESSION['username']) && isset($_SESSION['code'])) 
    {
            try{

                $email=$_POST['email_res'];
                $req='SELECT id_compte FROM compte WHERE mail=?';
                $geter1=$db->prepare($req);
                $geter1->BindParam(1,$email);
                $geter1->execute();
                $stm1=$geter1->fetch(PDO::FETCH_ASSOC);
                $geter=$db->prepare("SELECT id_compte from compte where mail=:mail");
                $geter->BindParam(':mail',$_SESSION['username']);
                $geter->execute();
                $stm=$geter->fetch(PDO::FETCH_ASSOC);


                $requete1=$db->prepare("INSERT INTO projet (`id_projet`, `titre`, `resume`, `description`, `motcle`, `id_porteur`, `id_responsable`) VALUES (NULL,?,?,?,?,?,?);");
                $requete1->bindValue(1,$_POST['titre_projet'],PDO::PARAM_STR);
                $requete1->bindValue(2,$_POST['resume_projet'],PDO::PARAM_STR);
                $requete1->bindValue(3,$_POST['description_projet'],PDO::PARAM_STR);
                $requete1->bindValue(4,$_POST['motcle'],PDO::PARAM_STR);
                $requete1->bindValue(5,$stm['id_compte'],PDO::PARAM_INT);
                $requete1->bindValue(6,$stm1['id_compte'],PDO::PARAM_INT);
                $requete1->execute();
                $titre=$_POST['titre_projet'];
            
                $geter2=$db->query("SELECT id_projet FROM `projet` WHERE titre='$titre'");
                $stm2=$geter2->fetch(PDO::FETCH_ASSOC);
                $aa=$stm2['id_projet'];
                

                

                








                // // /***********************************Insertion membre d'équipe****************************************************/


                
                $k=0;
                while(!empty($_POST['nom_eq'.$k])){
                    
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
                    $requete4->bindValue(10,$aa,PDO::PARAM_STR);

                    $requete4->execute();
                    $k+=1;
                }


                // // //  /***********************************Production scientifique****************************************************/



                $j=0;
                while(!empty($_POST['titreComplet'.$j])){
                  
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
                    $titre_=$_POST['titreComplet'.$j];
                    $geter23=$db->query("SELECT id_publication FROM `publication` WHERE titre='$titre_'");
                    $stm23=$geter23->fetch(PDO::FETCH_ASSOC);
                    $aa_=$stm23['id_publication'];   
                    
                $requete23=$db->query("INSERT INTO pcontientp (id_projet,id_publication) VALUES ($aa,$aa_)");
                    $j+=1;
                }

                // // /**********************************Insertion  de communication******************************************************/
            


                $s=0;
                while(!empty($_POST['communication'.$s])){
                    
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
                    $titre_1=$_POST['communication'.$s];
                    $geter231=$db->query("SELECT id_communication FROM `communication` WHERE titre='$titre_1'");
                    $stm231=$geter231->fetch(PDO::FETCH_ASSOC);
                    $aa_1=$stm231['id_communication'];   
                
                $requete231=$db->query("INSERT INTO pcontientc (id_projet,id_communication) VALUES ($aa,$aa_1)");
                    $s+=1;
                }

                //********************************************Fin  de communication******************************************************/




                $i=1;
                while(!empty($_POST['titreTh'.$i])){
                    $requete7='requete'.$i;
                    $requete7=$db->prepare("INSERT INTO these(id_these,titre,etablissement,fonction,thematique,date,auteur) VALUES(NULL,?,?,?,?,?,?)");
                    $requete7->bindValue(1,$_POST['titreTh'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(2,$_POST['etabville'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(3,$_POST['fonction_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(4,$_POST['thematique_these'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(5,$_POST['date_soutenance'.$i],PDO::PARAM_STR);
                    $requete7->bindValue(6,$_POST['auteur_these'.$i],PDO::PARAM_STR);
                    
                    $requete7->execute();
                    $titre_2=$_POST['titreTh'.$i];
                    $geter232=$db->query("SELECT id_these FROM `these` WHERE titre='$titre_2'");
                    $stm232=$geter232->fetch(PDO::FETCH_ASSOC);

                    $aa_2=$stm232['id_these'];   
                    
                    $requete232=$db->query("INSERT INTO pcontientt (id_projet,id_these) VALUES ($aa,$aa_2)");
                    $i+=1;
                   
                }
                header('location:profile.php');
            
            }
            catch (PDOException $e){
                echo "ERROR : ".$e->getMessage();
                die();
            }
}else{
    header('location:getform.php');
}