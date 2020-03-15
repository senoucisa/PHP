<?php
// fonction de debug

function debug ($var){
    echo'<pre>';
    print_r($var);
    echo'</pre>';
}

//fonctions liées au membre
//Verifier si le membre est connecté

function estConnecte(){
    if(isset($_SESSION['membre'])){ // si la session contient un indice "membre",c'est que l'internaute est passé par la page de connexion avec les bons pseudo/mdp
        return true; // il est connecté

    }else {
        return false; //il n'est pas connecté
    }   
}

//Vérifier si le membre est admin et connecté :

    function estAdmin(){
        if(estConnecte() && $_SESSION['membre']['statut'] == 1){ //Si le membre est connecté et que dans le meme temps son statut est 1 (pour admin),nous retournons true.
            return true;
        }else{
            return false;//Sinon dans le cas contraire nous retournons false.
        }
    }

    //Fonction pour exécuter toute les requêtes préparées:
    function executeRequete($requete,$parametres = array ()){
        //Assainissement des données avec htmlspecialchars:on parle d'échapper les données(échappement):

        foreach ($parametres as $indice => $valeur){
           $parametres[$indice]=htmlspecialchars($valeur);

        }//on parcours le tableau $parametres qui contient les marqueurs et leur valeur,on prend chaque valeur que l'on passe dans le htmlspecialchars() pour transformer les chevrons en entité HTML.Cette valeur une fois assainnie,on le remet dans son emplacement qui est $parametres[$indice].

        global $pdo;//global permet d'acceder à la variable $pdo qui est définit dans l'espace global du fichier init.php.

        $resultat = $pdo->prepare($requete);//on prepare la requete qui est contenue dans la variable $requete.
        $succes=$resultat->execute($parametres);//puis on l'execute en donnant le tableau $parametres qui associe les marqueurs à leur valeur. execute retourne "true" si la requete à marcher sinon "false" et on affecte ce resultat à la variable succés.

        if($succes === false){
            return false;// si la requete n'a pas marché,on retourne false.

        }else {
            return $resultat; // en cas de succes on retourne (l'objet PDOStatement qui contient le jeu de resultat.)
        }


    }

