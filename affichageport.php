<?php
require_once('condb.php');
session_name('abdeleatifi');
session_start ();
if (isset($_SESSION['username']) && isset($_SESSION['code'])) {

    $titre=$_GET['titre'];

    $stmmm=$db->prepare("SELECT id_projet FROM projet WHERE titre=:titre");
    $stmmm->BindParam(':titre',$_GET['titre'],PDO::PARAM_STR);
    $stmmm->execute();
    $tabbb=$stmmm->fetch(PDO::FETCH_ASSOC);

    $requete2=$db->prepare("SELECT resume FROM projet WHERE id_projet=:id");
    $requete2->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete2->execute();
    $resum=$requete2->fetch(PDO::FETCH_ASSOC);
    $resume=$resum['resume'];

    $requete3=$db->prepare("SELECT motcle FROM projet WHERE id_projet=:id");
    $requete3->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete3->execute();
    $motcl=$requete3->fetch(PDO::FETCH_ASSOC);
    $motcle=$motcl['motcle'];

    $requete5=$db->prepare("SELECT * FROM compte WHERE id_compte =(select id_porteur FROM projet WHERE id_projet=:id)");
    $requete5->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete5->execute();
    $porteur=$requete5->fetch(PDO::FETCH_ASSOC);

    $requete6=$db->prepare("SELECT * FROM compte WHERE id_compte =(select id_responsable FROM projet WHERE id_projet=:id)");
    $requete6->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete6->execute();
    $res=$requete6->fetch(PDO::FETCH_ASSOC);

    $requete7=$db->prepare("SELECT count(id_membre) FROM membre_equipe where id_projet=:id ");
    $requete7->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete7->execute();
    $nbre=$requete7->fetch(PDO::FETCH_ASSOC);

    $requete8=$db->prepare("SELECT * FROM membre_equipe WHERE id_projet =:id");
    $requete8->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete8->execute();
    $membre=$requete8->fetchall(PDO::FETCH_ASSOC);
    $i=0;


    $requete9=$db->prepare("SELECT count(id_publication) FROM pcontientp where id_projet=:id ");
    $requete9->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete9->execute();
    $nbrep=$requete9->fetch(PDO::FETCH_ASSOC);

    $requete10=$db->prepare("SELECT * FROM publication WHERE id_publication in (select id_publication FROM pcontientp where id_projet=:id)");
    $requete10->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete10->execute();
    $pub=$requete10->fetchall(PDO::FETCH_ASSOC);
    $j=0;

    $requete11=$db->prepare("SELECT count(id_communication) FROM pcontientc where id_projet=:id ");
    $requete11->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete11->execute();
    $nbrec=$requete11->fetch(PDO::FETCH_ASSOC);

    $requete12=$db->prepare("SELECT * FROM communication WHERE id_communication in (select id_communication FROM pcontientc where id_projet=:id)");
    $requete12->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete12->execute();
    $com=$requete12->fetchall(PDO::FETCH_ASSOC);
    $k=0;

    $requete13=$db->prepare("SELECT count(id_these) FROM pcontientt where id_projet=:id ");
    $requete13->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete13->execute();
    $nbret=$requete13->fetch(PDO::FETCH_ASSOC);

    $requete14=$db->prepare("SELECT * FROM these WHERE id_these in (select id_these FROM pcontientt where id_projet=:id)");
    $requete14->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
    $requete14->execute();
    $these=$requete14->fetchall(PDO::FETCH_ASSOC);
    $s=0;
            
                
            


    echo '<style> .project-tab {
        padding: 10%;
        margin-top: -8%;
    }
    .project-tab #tabs{
        background: #007b5e;
        color: #eee;
    }
    .project-tab #tabs h6.section-title{
        color: #eee;
    }
    .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 16px;
        font-weight: bold;
    }
    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 16px;
        font-weight: 600;
    }
    .project-tab .nav-link:hover {
        border: none;
    }
    .project-tab thead{
        background: #f3f3f3;
        color: #333;
    }
    .project-tab a{
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }  
    
body {
    background: url("css/loook2.png")  center; !important;
    background-position: center;
    background-size: cover;
}
</style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <section id="tabs" class="project-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table class="table" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Project</th>
                                                <th>Info</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td>Titre</td>
                                                <td>'.$_GET['titre'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Resume</td>
                                                <td>'.$resume.'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Mots Cles</td>
                                                <td>'.$motcle.'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Nom Et Prenom Du Porteur</td>
                                                <td>'.$porteur['nom'].' '.$porteur['prenom'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Civilite</td>
                                                <td>'.$porteur['civilite'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Email Porteur</td>
                                                <td>'.$porteur['mail'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Tel</td>
                                                <td>'.$porteur['tel'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Adresse</td>
                                                <td>'.$porteur['adresse'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>'.$porteur['grade'].'</td>
                                            </tr>
                                            <tr>
                                                <td>Structure De Recherche</td>
                                                <td>'.$porteur['structure de recherche'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Nom De Responsable</td>
                                                <td>'.$res['nom'].' '.$res['prenom'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Email Responsable</td>
                                                <td>'.$res['mail'].'</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Etablissement</td>
                                                <td>'.$res['etablissement'].'</td>
                                            </tr>';
                                        while($i<$nbre['count(id_membre)']){
                                            echo '<tr>
                                                
                                            <td>Nam Membre '.$i.'</td>
                                            <td>'.$membre[$i]['nom'].' '.$membre[$i]['prenom'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Civilite</td>
                                            <td>'.$membre[$i]['civilite'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Mail</td>
                                            <td>'.$membre[$i]['mail'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Tel</td>
                                            <td>'.$membre[$i]['tel'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Strecrure De Recherche</td>
                                            <td>'.$membre[$i]['structure_de_recherche'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Grad</td>
                                            <td>'.$membre[$i]['grade'].'</td>
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td>Les Tache A Realiser</td>
                                            <td>'.$membre[$i]['taches'].'</td>
                                        </tr>';
                                        $i++;
                                            
                                            }
                                        while($j<$nbrep['count(id_publication)']){
                                            echo '<tr>
                                                
                                            <td>Pub Num '.$j.'</td>
                                            <td>'.$pub[$j]['titre'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Auteurs</td>
                                            <td>'.$pub[$j]['auteurs'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Nom Periode</td>
                                            <td>'.$pub[$j]['nom_periode'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Thematique</td>
                                            <td>'.$pub[$j]['thematique'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Lien Web</td>
                                            <td><a>'.$pub[$j]['lienweb'].'</a></td>
                                        </tr>
                                        ';
                                        $j=$j+1;

                                        }

                                        while($k<$nbrec['count(id_communication)']){
                                            echo '<tr>
                                                
                                            <td> Com Num '.$k.'</td>
                                            <td>'.$com[$k]['titre'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Auteurs</td>
                                            <td>'.$com[$k]['auteurs'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu De Rencontre</td>
                                            <td>'.$com[$k]['lieu'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Date De Rencontre</td>
                                            <td>'.$com[$k]['date'].'</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Thematique</td>
                                            <td>'.$com[$k]['thematique'].'</td>
                                        </tr>
                                        <tr>
                                            
                                        <td>Thematique</td>
                                        <td><a>'.$com[$k]['lienweb'].'</a></td>
                                        </tr>';
                                        $k=$k+1;
                                        }
                                        while($s<$nbret['count(id_these)']){


                                        echo '<tr>
                                                
                                        <td> These Num '.$s.'</td>
                                        <td>'.$these[$s]['titre'].'</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Auteur</td>
                                        <td>'.$these[$s]['auteur'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Etablissement</td>
                                        <td>'.$these[$s]['etablissement'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Fonction</td>
                                        <td>'.$these[$s]['fonction'].'</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Thematique</td>
                                        <td>'.$these[$s]['thematique'].'</td>
                                    </tr>
                                    <tr>
                                        
                                    <td>Date De These</td>
                                    <td><a>'.$these[$s]['date'].'</a></td>
                                    </tr>';
                                    $s=$s+1;
                                        }
                                            echo '
                                        </tbody>
                                       </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>';




}