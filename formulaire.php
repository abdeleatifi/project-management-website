<?php
session_name('abdeleatifi');
session_start ();
if (isset($_SESSION['username']) && isset($_SESSION['code'])) {
    echo '<!DOCTYPE HTML>
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
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <!-- <link href="css/wickedpicker.css" rel="stylesheet" type=\'text/css\' media="all" />-->
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link rel="stylesheet" href="css/2emee.css">
        <link href="css/style5.css" rel=\'stylesheet\' type=\'text/css\' />





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
            <form action="save.php" method="POST">
                <h2 class="sub-heading-agileits">Infos Projet</h2>
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                        <input type="text" name="titre_projet" size="50" maxlength="80" value="" placeholder="Titre">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                        <input type="text" name="resume_projet" value="" placeholder="résumé">
                    </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="motcle" value="" placeholder="Mots clés">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text">
                    <textarea name="description_projet" placeholder="Description détaillée"></textarea>
                </div>
    
                <h3 class="sub-heading-agileits">Details sur le Porteur</h3>
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                        <input type="text" name="nom_port" value="" placeholder="Nom du porteur">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                        <input type="text" name="prenom_port" value="" placeholder="Prénom du porteur">
                    </div>
                </div>
    
                <div class="radio-section">
                    <label>Civilité</label>
                    <ul class="radio-buttons-w3-agileits">
                        <li>
                            <input type="radio" id="a-option" name="sexe_port" value="Mr">
                            <label for="a-option">Mr</label>
                        </li>
                        <li>
                            <input type="radio" id="b-option" name="sexe_port" value="MMe">
                            <label for="b-option">MMe</label>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                        <input type="Email" name="email_port" placeholder="Email" required="">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                        <input type="text" name="teleph_port" placeholder="Tel" required="">
                    </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text">
                    <input type="text" name="address_port" placeholder="Adresse" required="">
                </div>
    
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                        <select name="grade_port" class="form-control">
                                                <option>Grade</option>
                                                <option value="PES">PES</option>
                                                <option value="PH">PH</option>
                                                <option value="PA">PA</option>
                                            </select>
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                        <select name="specialite_port" class="form-control">
                                                <option>Spécialité</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Biochimie">Biochimie</option>
                                                <option value="Biologie moléculaire">Biologie moléculaire</option>
                                                <option value="Dentisterie">Dentisterie</option>
                                                <option value="Génie Chimique">Génie Chimique</option>
                                                <option value="Génétique">Génétique</option>
                                                <option value="Immunologie">Immunologie</option>
                                                <option value="Informatique">Informatique</option>
                                                <option value="Lettres">Lettres</option>
                                                <option value="Mathématiques">Mathématiques</option>
                                                <option value="Microbiologie">Microbiologie</option>
                                                <option value="Médecine">Médecine</option>
                                            </select>
                    </div>
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text">
                    <input type="text" name="structure_recherche_port" placeholder="Structure de recherche" required="">
                </div>
    
    
                <div class="main-flex-w3ls-sectns">
                    <div class="field-agileinfo-spc form-w3-agile-text1">
                        <input type="text" name="nom_res" value="" placeholder="Nom du responsable">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text2">
                        <input type="text" name="prenom_res" value="" placeholder="Prénom du responsable">
                    </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="Email" name="email_res" placeholder="Email du responsable" required="">
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text2">
                    <select name="ville_etab_port" class="form-control" id="ville0" onchange="etablismentmaroc(this.value,this.id);">
                                            <option value="nul">Veuillez sélectionner la ville de votre établissement</option>
                                            <option value="Agadir">Agadir</option>
                                            <option value="Ait_Melloul">Ait Melloul</option>
                                            <option value="Al_Hoceima">Al Hoceima</option>
                                            <option value="Beni_Mellal">Beni Mellal</option>
                                            <option value="Berrechid">Berrechid</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Dakhla">Dakhla</option>
                                            <option value="El_Jadida">El Jadida</option>
                                            <option value="El_Kalaa_Des_Sraghna">El Kalaa Des Sraghna</option>
                                            <option value="Errachidia">Errachidia</option>
                                            <option value="Es_Smara">Es-Smara</option>
                                            <option value="Essouira">Essouira</option>
                                            <option value="Fes">Fès</option>
                                            <option value="Guelmim">Guelmim</option>
                                            <option value="Ifrane">Ifrane</option>
                                            <option value="Kénitra">Kénitra</option>
                                            <option value="Khouribga">Khouribga</option>
                                            <option value="Laayoune">Laayoune</option>
                                            <option value="Larache">Larache</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Martil">Martil</option>
                                            <option value="Meknès">Meknès</option>
                                            <option value="Mohammedia">Mohammedia</option>
                                            <option value="Nador">Nador</option>
                                            <option value="Ouarzazate">Ouarzazate</option>
                                            <option value="Oujda">Oujda</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Safi">Safi</option>
                                            <option value="Sala_Al_Jadida">Sala Al Jadida</option>
                                            <option value="Salé">Salé</option>
                                            <option value="Settat">Settat</option>
                                            <option value="Sidi_Bennour">Sidi Bennour</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Taounate">Taounate</option>
                                            <option value="Taroudannt">Taroudannt</option>
                                            <option value="Taza">Taza</option>
                                            <option value="Tetouan">Tetouan</option>
                                        </select>
                </div>
    
    
                <div class="field-agileinfo-spc form-w3-agile-text2" id="ville0">
    
                </div>
    
                <!--                                               EQUIPE DE PROJET-------------------------------------------------->
    
                <h3 class="sub-heading-agileits">Equipe projet</h3>
                <div id="add" name="add2">
                    <div class="main-flex-w3ls-sectns">
                        <div class="field-agileinfo-spc form-w3-agile-text1">
                            <input type="text" name="nom_eq0" value="" placeholder="Nom">
                        </div>
                        <div class="field-agileinfo-spc form-w3-agile-text2">
                            <input type="text" name="prenom_eq0" value="" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="radio-section">
                        <label>Civilité</label>
                        <ul class="radio-buttons-w3-agileits">
                            <li>
                                <input type="radio" id="a-option" name="sexe_eq0" value="Mr">
                                <label for="a-option">Mr</label>
                                <div class="check"></div>
                            </li>
                            <li>
                                <input type="radio" id="b-option" name="sexe_eq0" value="MMe">
                                <label for="b-option">MMe</label>
                                <div class="check">
                                    <div class="inside"></div>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
    
                    <div class="main-flex-w3ls-sectns">
                        <div class="field-agileinfo-spc form-w3-agile-text1">
                            <input type="Email" name="email_eq0" placeholder="Email" required="">
                        </div>
                        <div class="field-agileinfo-spc form-w3-agile-text2">
                            <input type="text" name="teleph_eq0" placeholder="Tel" required="">
                        </div>
                    </div>
    
                    <div class="field-agileinfo-spc form-w3-agile-text">
                        <input type="text" name="structure_recherche_eq0" placeholder="Structure de recherche" required="">
                    </div>
    
    
                    <div class="main-flex-w3ls-sectns">
                        <div class="field-agileinfo-spc form-w3-agile-text1">
                            <select name="grade_eq0" class="form-control">
                                                <option>Grade</option>
                                                <option value="PES">PES</option>
                                                <option value="PH">PH</option>
                                                <option value="PA">PA</option>
                                            </select>
                        </div>
                        <div class="field-agileinfo-spc form-w3-agile-text2">
                            <select name="specialite_eq0" class="form-control">
                                                <option>Spécialité</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Biochimie">Biochimie</option>
                                                <option value="Biologie moléculaire">Biologie moléculaire</option>
                                                <option value="Dentisterie">Dentisterie</option>
                                                <option value="Génie Chimique">Génie Chimique</option>
                                                <option value="Génétique">Génétique</option>
                                                <option value="Immunologie">Immunologie</option>
                                                <option value="Informatique">Informatique</option>
                                                <option value="Lettres">Lettres</option>
                                                <option value="Mathématiques">Mathématiques</option>
                                                <option value="Microbiologie">Microbiologie</option>
                                                <option value="Médecine">Médecine</option>
                                            </select>
                        </div>
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text">
                        <textarea name="tache0" placeholder="Tâches à réaliser dans le projet"></textarea>
                    </div>
                </div>
                <div id="addeq" class="clear">
                </div>
                <input type="button" name="boutton" onclick="ajouter_un_member();" value="ajouter">
                <div class="clear"></div><br>
    
                <!-------------------------------------------------------FIN DE CODE EQUIPE--------------------------------------------------------->
                <br>
                <br>
                <br>
                <!---------------------------------------------------Production Scientifique-------------------------------------------------------->
                <h3 class="sub-heading-agileits">Production Scientifique</h3><br><br>
                <div id="pub">
                <h4 class="sub-heading-agileits">Ajouter une nouvelle publication</h4>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="titreComplet0" value="" placeholder="Titre Complet de la publication">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input  type="text" name="auteurs_prod0" value="" placeholder="Auteurs">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input  type="text" name="perioSC0" value="" placeholder="Nom complet du périodique scientifique">
                </div>
                <div class="triple-wthree">
                    <div class="field-agileinfo-spc form-w3-agile-text11">
                        <input  type="text" name="volume0" value="" placeholder=" volume">
    
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text22">
                        <input  type="text" name="issus0" value="" placeholder="issus">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text33">
                        <input  type="text" name="page0" value="" placeholder="pages">
                    </div>
                    <div class="field-agileinfo-spc form-w3-agile-text33">
                        <input  type="text" name="annee0" value="" placeholder="année">
                    </div>
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="base_donnee_facteur0" value="" placeholder="Base de données et facteur d\'impact du périodique">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input  type="text" name="theme_prod0" value="" placeholder="Thématique">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input  type="text" name="lien0" value="" placeholder="Lien web">
                </div>
            </div>
                <div id="pub_ajoute" class="clear">
    
                </div>
                <input type="button" name="boutton" onclick="ajouter_une_pub();" value="ajouter">
                <div class="clear" id="zone_pub">
                </div><br>
    
                <!---------------------------------------------------Fin Production Scientifique-------------------------------------------------------->
                <br>
                <br>
                <br>
    
                <!---------------------------------------------------Ajouter une communication---------------------------------------------------------->
                <h4 class="sub-heading-agileits">Ajouter une communication</h4>
                <div id="commun">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="communication0" value="" placeholder="Titre Complet de la communication">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="auteurs0" value="" placeholder="Auteurs">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="nom_renc0" value="" placeholder="Nom complet de la rencontre scientifique">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="lieu0" value="" placeholder="Lieu d\'organisation">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="date_rencontre0" placeholder="Date de la rencontre" value="" onfocus="(this.type=\'date\')" required="">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="them_renc0" value="" placeholder="Thématique">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="lienweb_renc0" value="" placeholder="Lien web">
                </div></div>
                <div id="ajouter_une_comm">
    
                </div>
                <input type="button" name="boutton" onclick="ajouter_une_comm();" value="ajouter">
                <div>
                </div>
                <!------------------------------------------------Fin communication ------------------------------------------------->
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
    
                <!------------------------------------------------Ajouter une thèse soutenue ------------------------------------------------->
    
                <h4 class="sub-heading-agileits">Ajouter une thèse soutenue</h4>
                <div id="these">
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="titreTh1" value="" placeholder="Titre de la thèse">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="auteur_these1" value="" placeholder="Auteur">
                </div>
                <div class="field-agileinfo-spc form-w3-agile-text2">
                    <select name="ville_etab_port1" class="form-control" id="ville1" onchange="etablismentmaroc(this.value,this.id);">
                        <option value="nul">Veuillez sélectionner la ville de votre établissement</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Ait_Melloul">Ait Melloul</option>
                        <option value="Al_Hoceima">Al Hoceima</option>
                        <option value="Beni_Mellal">Beni Mellal</option>
                        <option value="Berrechid">Berrechid</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Dakhla">Dakhla</option>
                        <option value="El_Jadida">El Jadida</option>
                        <option value="El_Kalaa_Des_Sraghna">El Kalaa Des Sraghna</option>
                        <option value="Errachidia">Errachidia</option>
                        <option value="Es_Smara">Es-Smara</option>
                        <option value="Essouira">Essouira</option>
                        <option value="Fes">Fès</option>
                        <option value="Guelmim">Guelmim</option>
                        <option value="Ifrane">Ifrane</option>
                        <option value="Kénitra">Kénitra</option>
                        <option value="Khouribga">Khouribga</option>
                        <option value="Laayoune">Laayoune</option>
                        <option value="Larache">Larache</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Martil">Martil</option>
                        <option value="Meknès">Meknès</option>
                        <option value="Mohammedia">Mohammedia</option>
                        <option value="Nador">Nador</option>
                        <option value="Ouarzazate">Ouarzazate</option>
                        <option value="Oujda">Oujda</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Safi">Safi</option>
                        <option value="Sala_Al_Jadida">Sala Al Jadida</option>
                        <option value="Salé">Salé</option>
                        <option value="Settat">Settat</option>
                        <option value="Sidi_Bennour">Sidi Bennour</option>
                        <option value="Tanger">Tanger</option>
                        <option value="Taounate">Taounate</option>
                        <option value="Taroudannt">Taroudannt</option>
                        <option value="Taza">Taza</option>
                        <option value="Tetouan">Tetouan</option>
                    </select>
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text" id="ville1">
    
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="fonction_these1" value="" placeholder="Fonction dans la these">
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="thematique_these1" value="" placeholder="Thematique">
                </div>
    
                <div class="field-agileinfo-spc form-w3-agile-text1">
                    <input type="text" name="date_soutenance1" placeholder="Date de soutenance" value="" onfocus="(this.type=\'date\')" required="">
                </div>
            </div>
                <div id="ajouter_une_these">
    
                </div>
                <input type="button" name="boutton" onclick="ajouter_une_these();" value="ajouter">
    
                <!------------------------------------------------Fin thèse soutenue------------------------------------------------->
                <br>
                <br>
                <br>
                <br>
                <div class="clear"></div>
                <input type="submit" value="Submit">
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
        <script src="js/ajouterw.js"></script>
    
    
    </body>
    
    </html>';
}
else{
    header('location:getform.php');
}
?>
