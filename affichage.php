<?php
    session_name('abdeleatifi');
    session_start ();
    require_once('condb.php');
        ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Les informations sur le projet</title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tags -->
    <!-- Stylesheet -->
    <!-- <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />-->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/2emee.css">
    <link href="css/style5.css" rel='stylesheet' type='text/css' />
    <!-- //Stylesheet -->

    
</head>

<body>

<nav class="navbar navbar-expand navbar-dark bg-primary" id="loun"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false"
            aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="#">Home</a> </li>
                <li class="nav-item active"> <a class="nav-link" href="index.php">Projets <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla1</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla2</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">blabla3</a> </li>

            </ul>
            <div id="singinbutton">
                <a class="aqqq" href="profile.php">PROFILE</a>
            </div>
            <form class="form-inline my-2 my-md-0"> </form>
        </div>

    </nav>
    <!--background-->
    <h1>Creat project </h1>
    <div class="booking-form-w3layouts">
        <!-- Form starts here -->
        <form  action="modification.php" method="POST">
            <h2 class="sub-heading-agileits">Infos Projet</h2>
            <br>
            <br>
            <br>
            <div class="main-flex-w3ls-sectns">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <?php 
                    $stmmm=$db->prepare("SELECT id_projet FROM projet WHERE titre=:titre");
                    $stmmm->BindParam(':titre',$_GET['titre'],PDO::PARAM_STR);
                    $stmmm->execute();
                    $tabbb=$stmmm->fetch(PDO::FETCH_ASSOC);
                      ?>   
                      <label class="affich" style="color:#bff098; font-size:18px">Titre du projet : </label>
                      <input type="hidden" name="ghirid" value=<?php echo $tabbb['id_projet'];?> >     
                    <input type="text" name="titre_projet" size="50" maxlength="80" value=<?php echo $_GET['titre'];?> placeholder="Titre">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                <?php 
                    $requete2=$db->prepare("SELECT resume FROM projet WHERE id_projet=:id");
                    $requete2->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                    $requete2->execute();
                    $resum=$requete2->fetch(PDO::FETCH_ASSOC);
                    $resume=$resum['resume'];   ?> 
                    <label class="affich" style="color:#bff098; font-size:18px">Résumee : </label>
                    <input type="text" name="resume_projet" value="<?php echo $resume;?>" placeholder="résumé">
                </div>
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <?php 
                    $requete3=$db->prepare("SELECT motcle FROM projet WHERE id_projet=:id");
                    $requete3->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                    $requete3->execute();
                    $motcl=$requete3->fetch(PDO::FETCH_ASSOC);
                    $motcle=$motcl['motcle'];   ?>
                    <label class="affich"style="color:#bff098; font-size:18px">Mot Clé : </label>
                <input type="text" name="motcle" value="<?php echo $motcle;?>" placeholder="Mots clés">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text">
            <?php 
                $requete4=$db->prepare("SELECT description FROM projet WHERE id_projet=:id");
                $requete4->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                $requete4->execute();
                $des=$requete4->fetch(PDO::FETCH_ASSOC);
                $desc=$des['description']; ?>
                <label class="affich"style="color:#bff098; font-size:18px">Description détaillée : </label>
                <textarea name="description_projet"  placeholder="Description détaillée"><?php echo $desc;?></textarea>
            </div>

            <br>
            <br>
            <br>

            <h3 class="sub-heading-agileits">Details sur le Porteur</h3>
            <br>
            <br>
            <br>
            <div class="main-flex-w3ls-sectns">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                <?php 
                    $requete5=$db->prepare("SELECT * FROM compte WHERE id_compte =(select id_porteur FROM projet WHERE id_projet=:id)");
                    $requete5->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                    $requete5->execute();
                    $porteur=$requete5->fetch(PDO::FETCH_ASSOC);
                    $nom=$porteur['nom']; ?>
                    <label class="affich"style="color:#bff098; font-size:18px">Nom du porteur : </label>
                    <input type="text" name="nom_port" value="<?php echo $nom;?>" placeholder="Nom du porteur">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                <label class="affich"style="color:#bff098; font-size:18px">Prénom du porteur : </label>
                    <input type="text" name="prenom_port" value="<?php echo $porteur['prenom'];?>" placeholder="Prénom du porteur">
                </div>
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Civilité : </label>
                <input type="text" name="sexe_port" placeholder="sexe" value="<?php echo $porteur['civilite']?>" required="">
            </div>
       
            <div class="main-flex-w3ls-sectns">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                <label class="affich"style="color:#bff098; font-size:18px"> Email du porteur : </label>
                    <input type="Email" name="email_port" value=<?php echo $porteur['mail'];?> placeholder="Email" required="">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                <label class="affich"style="color:#bff098; font-size:18px">Tel : </label>
                    <input type="text" name="teleph_port" placeholder="Tel" value="<?php echo $porteur['tel'];?>" required="">
                </div>
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Adresse : </label>
                <input type="text" name="address_port" placeholder="Adresse" value="<?php echo $porteur['adresse'];?>" required="">
            </div>

            <div class="main-flex-w3ls-sectns">
            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Grade : </label>
                <input type="text" name="grade_port" placeholder="grade du porteur" value="<?php echo $porteur['grade'];?>" required="">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Spécialité du porteur : </label>
                <input type="text" name="specialite_port" placeholder="specialite du porteur" value="<?php echo $porteur['specialite'];?>" required="">
            </div>
            </div>

            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Structure de recherche : </label>
                <input type="text" name="structure_recherche_port" placeholder="Structure de recherche" value="<?php echo $porteur['structure de recherche'];?>" required="">
            </div>
            <?php 
                $requete6=$db->prepare("SELECT * FROM compte WHERE id_compte =(select id_responsable FROM projet WHERE id_projet=:id)");
                $requete6->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                $requete6->execute();
                $res=$requete6->fetch(PDO::FETCH_ASSOC);?>

            <div class="main-flex-w3ls-sectns">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                <label class="affich"style="color:#bff098; font-size:18px">Nom de responsable : </label>
                    <input type="text" name="nom_res" value="<?php echo $res['nom'];?>" placeholder="Nom du responsable">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                <label class="affich"style="color:#bff098; font-size:18px">Prénom de responsable : </label>
                    <input type="text" name="prenom_res" value="<?php echo $res['prenom'];?>" placeholder="Prénom du responsable">
                </div>
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Titre de responsable : </label>
                <input type="Email" name="email_res" placeholder="Email du responsable" required="" value="<?php echo $res['mail'];?>">
            </div>

            <div class="field-agileinfo-spc form-w3-agile-text">
            <label class="affich"style="color:#bff098; font-size:18px">Etablissement du porteur : </label>
                <input type="text" name="etab_port" placeholder="etablissement du porteur" value="<?php echo $res['etablissement'];?>" required="">
            </div>
            <br>
            <br>
            <br>
            <!--                                               EQUIPE DE PROJET-------------------------------------------------->

            <h3 class="sub-heading-agileits">Equipe projet</h3>
            <br>
            <br>
            

            <?php 
                $requete7=$db->prepare("SELECT count(id_membre) FROM membre_equipe where id_projet=:id ");
                $requete7->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                $requete7->execute();
                $nbre=$requete7->fetch(PDO::FETCH_ASSOC);
                $requete8=$db->prepare("SELECT * FROM membre_equipe WHERE id_projet =:id");
                $requete8->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
                $requete8->execute();
                $membre=$requete8->fetchall(PDO::FETCH_ASSOC);
                $i=0;
            while($i<$nbre['count(id_membre)']){
           ?>
           <br>
            <br>
           <h4 class="sub-heading-agileits">Informations Du Membre</h4>
           <div class="field-agileinfo-spc form-w3-agile-text1">
           <label class="affich"style="color:#bff098; font-size:18px">Numéro du membre : </label>
                <input type="text" name="numero du membre" value="<?php echo 'Le membre numero :'.$i;?>" placeholder="Nom">
            </div>
            <div id="add" name="add2">
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                    <label class="affich"style="color:#bff098; font-size:18px">Nom : </label>
                        <input type="text" name="nom_eq<?php echo $i+1;?>" value="<?php echo $membre[$i]['nom'];?>" placeholder="Nom">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                    <label class="affich"style="color:#bff098; font-size:18px">Prénom : </label>
                        <input type="text" name="prenom_eq<?php echo $i+1;?>" value="<?php echo $membre[$i]['prenom'];?>" placeholder="Prénom">
                    </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                <label class="affich"style="color:#bff098; font-size:18px">Civilité : </label>
                    <input type="text" name="sexe_eq<?php echo $i+1;?>" placeholder="sexe membre" required="" value="<?php echo $membre[$i]['civilite'];?>" >
                </div>
                
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                    <label class="affich"style="color:#bff098; font-size:18px">Email : </label>
                        <input type="Email" name="email_eq<?php echo $i+1;?>" placeholder="Email" required="" value="<?php echo $membre[$i]['mail'];?>" >
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                    <label class="affich"style="color:#bff098; font-size:18px">Tel : </label>
                        <input type="text" name="teleph_eq<?php echo $i+1;?>" placeholder="Tel" required="" value="<?php echo $membre[$i]['tel'];?>">
                    </div>
                </div>

                <div class="field-agileinfo-spc form-w3-agile-text">
                <label class="affich"style="color:#bff098; font-size:18px">Structure de recherche : </label>
                    <input type="text" name="structure_recherche_eq<?php echo $i+1;?>" placeholder="Structure de recherche" required="" value="<?php echo $membre[$i]['structure_de_recherche'];?>">
                </div>


                <div class="main-flex-w3ls-sectns">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                <label class="affich"style="color:#bff098; font-size:18px">Grade : </label>
                    <input type="text" name="grade_eq<?php echo $i+1;?>" placeholder="grade" required="" value="<?php echo $membre[$i]['grade'];?>">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                <label class="affich"style="color:#bff098; font-size:18px">Spécialité : </label>
                    <input type="text" name="specialite_eq<?php echo $i+1;?>" placeholder="specialite" required="" value="<?php echo $membre[$i]['specialite'];?>">
                </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text">
                <label class="affich"style="color:#bff098; font-size:18px">Tâches à réaliser dans le projet : </label>
                    <textarea name="tache<?php echo $i+1;?>" placeholder="Tâches à réaliser dans le projet"><?php echo $membre[$i]['taches'];?></textarea>
                </div>
            </div>
            
            
            <?php $i=$i+1;
            };
            ?>
            <div id="addeq" class="clear">
            </div>
            <br>
            <br>
            <input type="button" name="boutton" onclick="ajouter_un_member(this.id);" value="ajouter" id="<?php echo $nbre['count(id_membre)']; ?>">
            <div class="clear"></div>
            <!-------------------------------------------------------FIN DE CODE EQUIPE--------------------------------------------------------->
            <br>
            <br>
            <br>
            <br>
            <!---------------------------------------------------Production Scientifique-------------------------------------------------------->
            <h3 class="sub-heading-agileits">Production Scientifique</h3>
            <br>
            <br>
            <br>
            <?php 
            $requete9=$db->prepare("SELECT count(id_publication) FROM pcontientp where id_projet=:id ");
            $requete9->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete9->execute();
            $nbrep=$requete9->fetch(PDO::FETCH_ASSOC);
            $requete10=$db->prepare("SELECT * FROM publication WHERE id_publication in (select id_publication FROM pcontientp where id_projet=:id)");
            $requete10->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete10->execute();
            $pub=$requete10->fetchall(PDO::FETCH_ASSOC);
            $j=0;
            while($j<$nbrep['count(id_publication)']){
           ?>
           <div id="pub">
            <h4 class="sub-heading-agileits">Ajouter une nouvelle publication</h4>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Titre de la publication : </label>
                <input type="text" name="titreComplet<?php echo $j+1;?>" value="<?php echo $pub[$j]['titre'];?>" placeholder="Titre Complet de la publication">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Auteurs de la publication : </label>
                <input  type="text" name="auteurs_prod<?php echo $j+1;?>" value="<?php echo $pub[$j]['auteurs'];?>" placeholder="Auteurs">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Nom de la période : </label>
                <input  type="text" name="perioSC<?php echo $j+1;?>" value="<?php echo $pub[$j]['nom_periode'];?>" placeholder="Nom complet du périodique scientifique">
            </div>
            <div class="triple-wthree">
                <div class="field-agileinfo-spc form-w3-agile-text11">
                <label class="affich"style="color:#bff098; font-size:18px">Volume : </label>
                    <input  type="text" name="volume<?php echo $j+1;?>" value="<?php echo $pub[$j]['volume'];?>" placeholder=" volume">

                </div>
                <div class="field-agileinfo-spc form-w3-agile-text22">
                <label class="affich"style="color:#bff098; font-size:18px">Issus : </label>
                    <input  type="text" name="issus<?php echo $j+1;?>" value="<?php echo $pub[$j]['issus'];?>" placeholder="issus">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text33">
                <label class="affich"style="color:#bff098; font-size:18px">Pages : </label>
                    <input  type="text" name="page<?php echo $j+1;?>" value="<?php echo $pub[$j]['pages'];?>" placeholder="pages">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text33">
                <label class="affich"style="color:#bff098; font-size:18px">Année : </label>
                    <input  type="text" name="annee<?php echo $j+1;?>" value="<?php echo $pub[$j]['annee'];?>" placeholder="année">
                </div>
            
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Base de données et facteur d'impact du périodique : </label>
                <input type="text" name="base_donnee_facteur<?php echo $j+1;?>" value="<?php echo $pub[$j]['basedonnee'];?>" placeholder="Base de données et facteur d'impact du périodique">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Thematique : </label>
                <input  type="text" name="theme_prod<?php echo $j+1;?>" value="<?php echo $pub[$j]['thematique'];?>" placeholder="Thématique">
            </div>
            
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Lien web de la publication : </label>
                <input  type="text" name="lien<?php echo $j+1;?>" value="<?php echo $pub[$j]['lienweb'];?>" placeholder="Lien web">
            </div>
            <br>
            <br>
            
            
            <?php 
            $j=$j+1;
            }
            ?>
            <div id="pub_ajoute" class="clear">
            </div>
            
            <input type="button" name="boutton" onclick="ajouter_une_pub(this.id);" value="ajouter" id="<?php echo $nbrep['count(id_publication)']; ?>">
            <div class="clear" id="zone_pub">
            </div>
            <br>
        </div>
        <br>
        <br>
        <br>
        <br>
      
        
            

            <!---------------------------------------------------Fin Production Scientifique-------------------------------------------------------->


            <!---------------------------------------------------Ajouter une communication---------------------------------------------------------->
            <h2 class="sub-heading-agileits">Les Communications</h2>
           

            <?php 
            $requete11=$db->prepare("SELECT count(id_communication) FROM pcontientc where id_projet=:id ");
            $requete11->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete11->execute();
            $nbrec=$requete11->fetch(PDO::FETCH_ASSOC);
            $requete12=$db->prepare("SELECT * FROM communication WHERE id_communication in (select id_communication FROM pcontientc where id_projet=:id)");
            $requete12->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete12->execute();
            $com=$requete12->fetchall(PDO::FETCH_ASSOC);
            $k=0;
            while($k<$nbrec['count(id_communication)']){
           ?>
           <br>
            <br>
            <br>
            <br>
           <h4 class="sub-heading-agileits">Ajouter une communication</h4>
            <div id="commun">
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Titre de la communication : </label>
                <input type="text" name="communication<?php echo $k+1;?>" value="<?php echo $com[$k]['titre'];?>" placeholder="Titre Complet de la communication">
            </div>
            
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Auteurs de la communication : </label>
                <input type="text" name="auteurs<?php echo $k+1;?>" value="<?php echo $com[$k]['auteurs'];?>" placeholder="Auteurs">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Nom de la rencontre : </label>
                <input type="text" name="nom_renc<?php echo $k+1;?>" value="<?php echo $com[$k]['nomrencontre'];?>" placeholder="Nom complet de la rencontre scientifique">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Lieu d'organisation : </label>
                <input type="text" name="lieu<?php echo $k+1;?>" value="<?php echo $com[$k]['lieu'];?>" placeholder="Lieu d'organisation">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Date de la rencontre : </label>
                <input type="text" name="date_rencontre<?php echo $k+1;?>" placeholder="Date de la rencontre" value="<?php echo $com[$k]['date'];?>" onfocus="(this.type='date')" required="">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Thematique : </label>
                <input type="text" name="them_renc<?php echo $k+1;?>" value="<?php echo $com[$k]['thematique'];?>" placeholder="Thématique">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Lien web de la communication : </label>
                <input type="text" name="lienweb_renc<?php echo $k+1;?>" value="<?php echo $com[$k]['lienweb'];?>" placeholder="Lien web">
            </div></div>
            
            
            <?php $k=$k+1;} ?>
            <div id="ajouter_une_comm">

            </div>
            
            <input type="button" name="boutton" onclick="ajouter_une_comm(this.id);" value="ajouter" id="<?php echo $nbrec['count(id_communication)']; ?>">
            <div>
            </div>
            <!------------------------------------------------Fin communication ------------------------------------------------->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <!------------------------------------------------Ajouter une thèse soutenue ------------------------------------------------->

            <h2 class="sub-heading-agileits">Thèse Soutenue</h2>
            
            <?php 
            $requete13=$db->prepare("SELECT count(id_these) FROM pcontientt where id_projet=:id ");
            $requete13->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete13->execute();
            $nbret=$requete13->fetch(PDO::FETCH_ASSOC);
            $requete14=$db->prepare("SELECT * FROM these WHERE id_these in (select id_these FROM pcontientt where id_projet=:id)");
            $requete14->BindParam(':id',$tabbb['id_projet'],PDO::PARAM_INT);
            $requete14->execute();
            $these=$requete14->fetchall(PDO::FETCH_ASSOC);
            $s=0;
            while($s<$nbret['count(id_these)']){
           ?>
           <br><br><br><br>
           <h4 class="sub-heading-agileits">Ajouter une thèse soutenue</h4>
            <div id="these">
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Titre de la thèse soutenue : </label>
                <input type="text" name="titreTh<?php echo $s+1;?>" value="<?php echo $these[$s]['titre'];?>" placeholder="Titre de la thèse">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Auteurs de la thèse soutenue : </label>
                <input type="text" name="auteur_these<?php echo $s+1;?>" value="<?php echo $these[$s]['auteur'];?>" placeholder="Auteur">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text" id="ville1">
            <label class="affich"style="color:#bff098; font-size:18px">Etablissement : </label>
                <input type="text" name="ville<?php echo $s+1;?>" value="<?php echo $these[$s]['etablissement'];?>" placeholder="Auteur">
            </div>
            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Fonction dans la thèse soutenue : </label>
                <input type="text" name="fonction_these<?php echo $s+1;?>" value="<?php echo $these[$s]['fonction'];?>" placeholder="Fonction dans la these">
            </div>

            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px"style="color:#bff098; font-size:18px">Thematique : </label>
                <input type="text" name="thematique_these<?php echo $s+1;?>" value="<?php echo $these[$s]['thematique'];?>" placeholder="Thematique">
            </div>


            <div class="field-agileinfo-spc form-w3-agile-text1">
            <label class="affich"style="color:#bff098; font-size:18px">Date de la soutenance : </label>
                <input type="text" name="date_soutenance<?php echo $s+1;?>" placeholder="Date de soutenance" value="<?php echo $these[$s]['date'];?>" onfocus="(this.type='date')" required="">
            </div>
            
            <?php 
            $s=$s+1;
            };?>
        </div>

        <div id="ajouter_une_these">
        </div>
        <input type="button" name="boutton" onclick="ajouter_une_these(this.id);" value="Ajouter" id="<?php echo $nbret['count(id_these)']; ?>" >
            
        <br><br><br><br>

            <!------------------------------------------------Fin thèse soutenue------------------------------------------------->
            <div class="clear"></div>
            <input type="submit" value="Modifier">
            <input type="reset" value="Clear Form">
            <div class="clear"></div>
        </form>

    </div>
    <!--copyright-->
    <div class="copyright">
        <p>&copy; 2020 FSTM</p>
    </div>
    <!--//copyright-->
    <div id="scriptata">

    </div>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="js/modifier.js"></script>


</body>

</html>