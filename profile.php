<?php
session_name('abdeleatifi');
session_start ();
require_once('condb.php');
if (isset($_SESSION['username']) && isset($_SESSION['code'])) {



    $req="SELECT nom,prenom,grade,mail,specialite,etablissement,tel,civilite,role,adresse FROM compte WHERE mail=:mail AND mdp=:mdp";
    $stm=$db->prepare($req);
    $stm->BindParam(':mail',$_SESSION['username'],PDO::PARAM_STR);
    $stm->BindParam(':mdp',$_SESSION['code'],PDO::PARAM_STR);
    $stm->execute();
    $tab=$stm->Fetch(PDO::FETCH_ASSOC);


    $req2="SELECT titre,motcle FROM projet WHERE id_porteur in(select id_compte FROM compte WHERE mail=:mail AND mdp=:mdp)";
    $stm2=$db->prepare($req2);
    $stm2->BindParam(':mail',$_SESSION['username'],PDO::PARAM_STR);
    $stm2->BindParam(':mdp',$_SESSION['code'],PDO::PARAM_STR);
    $stm2->execute();
    $tab2=$stm2->FetchAll(PDO::FETCH_ASSOC);
    $siz=sizeof($tab2);
   
    
    if ($tab["role"]=='responsable'){
        
        

        echo '<!DOCTYPE html>
        <html>
        
        <head>

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="css/profile22.css">

            
            <title>profile</title>

        </head>
        
        <body style="background:red;">
            <header id="nav_bar">
                <nav class="navbar navbar-expand navbar-dark bg-primary" id="loun"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"> <a class="nav-link" href="#">Home</a> </li>
                            <li class="nav-item active"> <a class="nav-link" href="index.php">Projets <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">blabla1</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">blabla2</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">blabla3</a> </li>
                        </ul>
                        <div id="deconnecter">
                            <a style="color: rgba(255, 255, 255, .5);;text-decoration:none;font-size: 20px;font-family: monospace;" href="deconnecter.php">DECONNECTER</a>
                        </div>
                        <form class="form-inline my-2 my-md-0"> </form>
                    </div>
                </nav>
            </header>
            <div class="container">
            <div class="jumbotron" id="info_profile">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="css/imgs/profile.png" alt="stack photo" class="img" id="img_profile">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2>'.$tab["civilite"].' '.$tab["nom"].'&nbsp&nbsp'.$tab["prenom"].'</h2>
                    </div>
                    <hr>
                    <ul class="container details">
                        <li>
                            <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Type De Compte : '.$tab["role"].'</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>phone number : '.$tab["tel"].'</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Email : '.$tab["mail"].'</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Specialite : '.$tab["specialite"].'</p>
                        </li>
                        <li>
                            <p><span style="width:50px;"></span> Grade : '.$tab['grade'].'</p>
                        </li>
                        <li>
                        <p><span style="width:50px;"></span> Etablissement : '.$tab['etablissement'].'</p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="table">
        <div class="container">
            <div class="table-wrapper" id="table1_2">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Projets <b> Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="formulaire.php"><button type="button" href="www.youtube.com" class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter Un Projet</button></a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Mots Cles</th>
                            <th>Responsable</th>
                            <th>Email Responsable</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
                    for($i=0;$i<$siz;$i++){
                        $req1="SELECT nom,prenom,civilite,mail FROM compte WHERE id_compte in (SELECT id_responsable FROM projet WHERE titre=:titre)";
                        $stm1=$db->prepare($req1);
                        $stm1->BindParam(':titre',$tab2[$i]['titre'],PDO::PARAM_STR);
                        $stm1->execute();
                        $tab1=$stm1->Fetch(PDO::FETCH_ASSOC);

                        echo '<tr>
                        <td>'.$tab2[$i]['titre'].'</td>
                        <td>'.$tab2[$i]['motcle'].'</td>
                        <td>'.$tab1['civilite'].' '.$tab1['prenom'].' '.$tab1['nom'].'</td>
                        <td>'.$tab1['mail'].'</td>

                        <td>
                            <a class="edit" title="Edit" href="affichage.php?titre='.$tab2[$i]['titre'].'" data-toggle="tooltip"><i class="material-icons"></i></a>
                            
                            <a class="delete" title="Delete" href="del.php?titre='.$tab2[$i]['titre'].'" data-toggle="tooltip"><i class="material-icons"></i></a>
                      
                        </td>
                    </tr>';
                    }
                        


                    echo '</tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="table">
        <div class="container">
            <div class="table-wrapper" id="table1_2">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Projets <b> Details</b></h2>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Mots Cles</th>
                            <th>Porteur</th>
                            <th>Email Porteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';

                    $req3="SELECT titre,motcle FROM projet WHERE id_responsable in(select id_compte FROM compte WHERE mail=:mail AND mdp=:mdp)";
                    $stm3=$db->prepare($req3);
                    $stm3->BindParam(':mail',$_SESSION['username'],PDO::PARAM_STR);
                    $stm3->BindParam(':mdp',$_SESSION['code'],PDO::PARAM_STR);
                    $stm3->execute();
                    $tab3=$stm3->FetchAll(PDO::FETCH_ASSOC);
                    $siz3=sizeof($tab3);

                    for($i=0;$i<$siz3;$i++){
                        $req4="SELECT nom,prenom,civilite,mail,etablissement FROM compte WHERE id_compte in (SELECT id_porteur FROM projet WHERE titre=:titre)";
                        $stm4=$db->prepare($req4);
                        $stm4->BindParam(':titre',$tab3[$i]['titre'],PDO::PARAM_STR);
                        $stm4->execute();
                        $tab4=$stm4->Fetch(PDO::FETCH_ASSOC);

                        echo '<tr>
                        <td>'.$tab3[$i]['titre'].'</td>
                        <td>'.$tab3[$i]['motcle'].'</td>
                        <td>'.$tab4['civilite'].' '.$tab4['prenom'].' '.$tab4['nom'].'</td>
                        <td>'.$tab4['mail'].'</td>
                        <td><a class="edit" title="Edit" href="affichageport.php?titre='.$tab2[$i]['titre'].'" data-toggle="tooltip"><i class="material-icons"></i></a></td>
                        </tr>';
                    }
                    

                        


                    echo'</tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>';
}else{
    echo '<!DOCTYPE html>
    <html>
    
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/profile22.css">

        

        
        
        <title>profile</title>
    </head>
    
    <body>
        <header id="nav_bar">
            <nav class="navbar navbar-expand navbar-dark bg-primary" id="loun"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link" href="#">Home</a> </li>
                        <li class="nav-item active"> <a class="nav-link" href="index.php">Projets <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">blabla1</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">blabla2</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">blabla3</a> </li>
                    </ul>
                    <div id="deconnecter">
                        <a style="color: rgba(255, 255, 255, .5);;text-decoration:none;font-size: 20px;font-family: monospace;" href="deconnecter.php">DECONNECTER</a>
                    </div>
                    <form class="form-inline my-2 my-md-0"> </form>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="jumbotron" id="info_profile">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img src="css/imgs/profile.png" alt="stack photo" class="img" id="img_profile">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container" style="border-bottom:1px solid black">
                            <h2>'.$tab["civilite"].' '.$tab["nom"].'&nbsp&nbsp'.$tab["prenom"].'</h2>
                        </div>
                        <hr>
                        <ul class="container details">
                            <li>
                                <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Type De Compte : '.$tab["role"].'</p>
                            </li>
                            <li>
                                <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>phone number : '.$tab["tel"].'</p>
                            </li>
                            <li>
                                <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Email : '.$tab["mail"].'</p>
                            </li>
                            <li>
                                <p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Specialite : '.$tab["specialite"].'</p>
                            </li>
                            <li>
                                <p><span style="width:50px;"></span> Grade : '.$tab['grade'].'</p>
                            </li>
                            <li>
                            <p><span style="width:50px;"></span> Etablissement : '.$tab['etablissement'].'</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="table">
            <div class="container">
                <div class="table-wrapper" id="table1_2">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Projets <b> Details</b></h2>
                            </div>
                            <div class="col-sm-4">
                                <a href="formulaire.php"><button type="button" href="www.youtube.com" class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter Un Projet</button></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Mots Cles</th>
                                <th>Responsable</th>
                                <th>Email Responsable</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
                        for($i=0;$i<$siz;$i++){
                            $req1="SELECT nom,prenom,civilite,mail FROM compte WHERE id_compte in (SELECT id_responsable FROM projet WHERE titre=:titre)";
                            $stm1=$db->prepare($req1);
                            $stm1->BindParam(':titre',$tab2[$i]['titre'],PDO::PARAM_STR);
                            $stm1->execute();
                            $tab1=$stm1->Fetch(PDO::FETCH_ASSOC);
    
                            echo '<tr>
                            <td>'.$tab2[$i]['titre'].'</td>
                            <td>'.$tab2[$i]['motcle'].'</td>
                            <td>'.$tab1['civilite'].' '.$tab1['prenom'].' '.$tab1['nom'].'</td>
                            <td>'.$tab1['mail'].'</td>
    
                            <td>
                                <a class="edit" title="Edit" href="affichage.php?titre='.$tab2[$i]['titre'].'" data-toggle="tooltip"><i class="material-icons"></i></a>
                                
                                <a class="delete" title="Delete" href="del.php?titre='.$tab2[$i]['titre'].'" data-toggle="tooltip"><i class="material-icons"></i></a>
                          
                            </td>
                        </tr>';
                        }
                            

    
                        echo '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    
    </html>';
    
}
}else
{
    header('location:connecter.php');
}

