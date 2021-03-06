<!DOCTYPE html>
<!--
* @file       	/header.php
* @brief 		    Projet WEB 2
* @details 		
* @author     	Bourihane Salim, Massicotte Natasha, Mercier Renaud, Romodina Yuliya - 15612
* @version    	v.1 | fevrier 2018
-->
<html lang="fr">  
<head>
    <!-- meta tags requis -->
    <meta charset="UTF-8">
    <meta name="description" content="ProjetWEB2">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap - CSS -->
    <link rel="stylesheet" target=_blank href="http://code.jquery.com/ui/1.8.21/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" target=_blank href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
    <link rel="stylesheet" target=_blank href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" target=_blank href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.rateyo.css"/>
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet">
    
    <!-- src script js -->
    <script type= "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/e58c171d55.js"></script>
    <script type="text/javascript" src="./js/jquery.rateyo.js"></script>
    <script src="js/formEvt.js"></script>   
    <script src="js/fonctions.js"></script>
    
    <!-- Tether, ensuite Bootstrap JS. -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="js/script.js" ></script>
    <script src="js/paiement.js" ></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<header>
</header>
<body class="container-fluid">

    <div class="row navigation-logo">
        <div class="col-1 logo-entete">
             <a class="navbar-brand" href="index.php"><img src="./images/logo_sur_blanc.svg" alt="loumamaison"></a>
        </div>

        <div class="col-lg-11 offset-3 navigation">
            
              <nav class="navbar navbar-toggleable-sm navbar-light bg-faded col-12">
                  
                <button class="navbar-toggler navbar-toggler-right mt-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-1 ml-3" id="navbarNavDropdown">
                  <ul class="navbar-nav mt-1 mr-auto">
                      <li class="nav-item active">
                          <a class="nav-link" href="index.php?Appartements">Accueil</a>
                      </li>
                          <?php

                        if(isset($_SESSION["username"])) 
                      {
                          // actions disponibles pour usager de type admin et valide par superadmin
                          if((in_array(1,$_SESSION["role"])||in_array(2,$_SESSION["role"])) && $_SESSION["isActiv"] ==1)
                          {
                      ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?Usagers&action=afficheListeUsagers">Usagers</a></li>
                            <?php
                          }
                          if((isset($_SESSION["isBanned"]) && $_SESSION["isBanned"] == 0) && (isset($_SESSION["isActiv"]) && $_SESSION["isActiv"] == 1) && ( in_array(1 ,$_SESSION["role"]) || in_array(2 ,$_SESSION["role"]) || in_array(3 ,$_SESSION["role"])) ) 
                          { 
                      ?> 
                        <li class="nav-item"><a class="nav-link" id="aModalApt" href="index.php?Appartements&action=afficherInscriptionApt">Inscrire un appartement</a></li>
                      <?php 
                          } 
                      }
                      else{
                      ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?Usagers&action=afficherInscriptionUsager">S'inscrire</a></li>

                      <?php
                      }
                          ?>
                        <li class="nav-item connexion"><a class="nav-link" href="index.php?Usagers&action=<?=$data['log']?>"><?=$data['log']?></a></li>
                    </ul>
                    
                      <?php
                      if(isset($_SESSION["username"])) 
                      {
                          // actions disponibles pour usager de type admin et valide par superadmin
                          if((isset($_SESSION["isBanned"]) && $_SESSION["isBanned"] == 0) && (isset($_SESSION["isActiv"]) && $_SESSION["isActiv"] == 1))
                          {
                      ?>
                        <ul class="navbar-nav mt-1 ml-auto">
                            <li class="nav-item connexion"><a class="nav-link" href="index.php?Usagers&action=afficheUsager&idUsager=<?=$_SESSION["username"]?>&messages=ok"><span class="badge badge-notify"></span><i class="fa fa-envelope"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?Usagers&action=afficheUsager&idUsager=<?=$_SESSION['username']?>"><i class="fa fa-cog fa-lg" aria-hidden="true"></i></a></li>
                        </ul>
                        <?php
                          }
                      }
                      ?>
                    
                </div>
              </nav>   
        </div>
          <!-- Messages a l'usager concernant son statut -->
        <div class="message_user">

        </div>
    </div>
    <ul class="navbar-nav mr-auto bg-secondary text-white p-2 pt-4 mt-5">
        <li class="nav-item messageHeader ml-3"><?=$data['message']?></li>
        <li class="nav-item messageHeader ml-3"><?=$data['banni']?></li>
    </ul>