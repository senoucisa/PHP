<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ma boutique</title>
  </head>
  <body>

  <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!--La marque-->
                <a class="navbar-brand" href="<?php echo RACINE_SITE . 'index.php';?>">Ma BOUTIQUE</a>
                <!-- on utilise la constante RACINE_SITE pour faire un chemin absolu vers l'index.php -->

                <!-- le burger a aller chercher sur bootstrap -->

                <!-- Le menu de navigation -->
                <div class="collapse navbar-collapse" id="nav1">
                    <ul class="navbar-nav ml-auto">
                <?php
                    echo'<li><a class="nav-link" href="'. RACINE_SITE .'index.php">Boutique</a></li>';

                    if(estConnecte()){//si membre connecté
                        echo'<li><a class="nav-link" href="'. RACINE_SITE .'profil.php">Profil</a></li>';
                        echo'<li><a class="nav-link" href="'. RACINE_SITE .'connexion.php?action=deconnexion">Se déconnecter</a></li>';
                           

                    }else{//si membre non connecté
                        echo'<li><a class="nav-link" href="'. RACINE_SITE .'inscription.php">Inscription</a></li>';
                        echo'<li><a class="nav-link" href="'. RACINE_SITE .'connexion.php">Connexion</a></li>';
                           

                    }// fin du if (estConnecte())

                    echo'<li><a class="nav-link" href="'. RACINE_SITE .'panier.php">Panier</a></li>';

                    if(estAdmin()){ // si le membre est connecté et admin
                        echo'<li><a class="nav-link" href="'. RACINE_SITE .'admin/gestion_boutique.php">Gestion de la boutique</a></li>';
                           

                    }

                ?>  
                    
                    
                    </ul>
            
                </div>

    
            </div> 
            <!-- fermeture de la div container -->

        </nav>

        <!-- Début du contenu de la page -->
        <div class="container" style="min-height:80vh;">
            <div class="row">
                <div class="col-12">         <!--ses balises sont ouvertes dans le header.php mais fermées dans le footer.php-->
        
        
        
       
    

 







