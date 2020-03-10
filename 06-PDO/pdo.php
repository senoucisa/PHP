<?php
//------------------------------
//              PDO
//------------------------------
//L'extension PDO pour PHP DATA OBJETS définit une interface qui permet d'éxécuter des requetes SQL dans du PHP.

function debug($var){
    echo'<pre>';
        print_r($var);
    echo'</pre>';
}

//-----------------------------------------
echo '<h2> 01- Connexion à la BDD : </h2>';
//-----------------------------------------

$pdo = new PDO ('mysql:host=localhost;dbname=entreprise',// driver mysql (IBM,ORACLE,ODBC....),nom du serveur(host),nom de la BDD (dbname)
                'root',//pseudo de la BDD
                '', //mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Pour afficher les erreurs SQL dans le navigateur.
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//Pour définir le charset des échanges avec la BDD
                ));
//$pdo ci-dessus est un objet qui représente la connexion à la BDD entreprise.

debug($pdo);
debug(get_class_methods($pdo));//permet d'afficher la liste des methodes presentes dans l'objet $pdo.


//--------------------------------------------------
echo '<h2> 02-Faire des requêtes avec exec: </h2>';
//--------------------------------------------------
//on va insérer un employé en BDD :
$resultat = $pdo->exec("INSERT INTO employes (prenom,nom,sexe,service,date_embauche,salaire)VALUES('John','Doe','m','informatique','2020-03-09',2000)");

/*La methode exec()est utilisée pour faire des requêtes qui ne retournent pas de jeu de résultat :INSERT,UPDATE,DELETE.

Valeur de retour:
                Succes:indique le nombre de lignes affectées par la requête 
                echec:false
*/
echo 'Nombre d\'enregistrements affectés par la requête :' . $resultat . '<br>';
echo 'Dernier id généré en BDD:' .$pdo->lastInsertId(); // permet de fournir le dernier identifiant générer en BDD
//Supprimer les John Doe de la BDD:
$resultat = $pdo-> exec("DELETE FROM employes WHERE prenom= 'John' AND nom = 'Doe' ");//Cette methode sert a supprimer une personne de la table dans la BDD.


//--------------------------------------------------
echo '<h2> 03-Faire des requêtes avec query: </h2>';
//--------------------------------------------------
//On va selectionner les informations de l'employé Daniel :

    $resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'");
    /*
        Au contraire d'exec(),query() est utilisé pour faire des requêtes qui retournent un ou plusieurs resultat:SELECT.on peut aussi l'utiliser avec DELETE,UPDATE et INSERT.

    Valeur de retour:

        Si succés:query()retourne un nouvel objet qui provient de la classe PDOStatement.
        en cas d'echec :sa retourne FALSE.
    */
    debug($resultat); //Dans cette objet $resultat ,nous ne voyons pas les données conçernant Daniel.Pourtant elles s'y trouvent.Pour y acceder nous devons utiliser une methode $resultat qui s'appelle fetch().

    //On transforme l'objet $resultat avec cette méthode fetch():
        $employe = $resultat ->fetch(PDO::FETCH_ASSOC); // permet de transformer l'objet $resultat en  un tableau associatif qu'on affecte à $employé avec le FETCH_ASSOC .On y trouve en indice le nom des champs de la requête SQL(on lui à mis une étoile * pour avoir tous les champs).
        debug($employe);
        echo 'je suis ' . $employe['prenom'] . '  ' . $employe['nom'] . ' du service ' . $employe['service'] . '<br>';
/*Pour information, on peut mettre dans les ()de fetch :
    PDO:: FETCH_NUM             pour obtenir un tableau aux indices numériques .
    PDO:: FETCH_OBJ             pour obtenir un dernier objet.
    ou encore des ()vides       pour obtenir un mélange de tableau associatif et numérique. 
*/

//Exercice:Afficher le service de l'employe dont l'ID de l'employe est le 417.
$resultat = $pdo->query("SELECT service FROM employes WHERE id_employes = 417");
debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);
debug($employe);

echo'le service de l\'employe  dont l\'id employe = 417  est ' . $employe ['service'] . '<br>';


//-----------------------------------------------------------------------------
echo '<h2> 04-Faire des requêtes avec query() avec plusieurs resultat: </h2>';
//-----------------------------------------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");
debug($resultat);
echo'Nombre d\'employes :' . $resultat->rowCount() . '<br>'; //Cette methode rowCount()permet de compter le nombre de lignes retournées par la requête (exemple: nombre de produits selectionnéz par l'internaute).

//Comme nous avons plusieurs lignes dans $resultat,nous devons faire une boucle pour les parcourir.

while ($employes = $resultat->fetch(PDO::FETCH_ASSOC)){ //fetch() veut dire va chercher. Cette formule permet de faire une boucle pour afficher tous les éléments et le transforme en tableau associatif.La boucle while permet de faire avancer le curseur dans l'objet quand il arrive à la fin,fetch()retourne false et la boucle s'arrete.

    // debug($employes);//$employes est un array associatif qui contient les données de chaque employes(nous avons 1 employé par tour de boucle).

    echo '<div>';
        echo'<div>' . $employes['id_employes']  .  '</div>';
        echo'<div>' . $employes['prenom']  . '  ' . $employes['nom'] . '</div>';
        echo'<div>' . $employes['service']  .  '</div>';
        echo'<div>' . $employes['salaire']  .  '€</div>';

    echo '</div><hr>';
}

//Si vous etes certains que votre requête ne donne qu'un seul résultat (par identifiant par exemple),alors on ne fait pas de boucle.
//Si votre requête peut donner un ou plusieurs résultats,alors on fait une boucle(sinon on obtient que le premier résultat de la requête).
//----------------------------
echo '<h2> 05-Exercice </h2>';
//---------------------------

//Exercice: vous affichez la liste des differents services dans une liste <ul><li>,en mettant un servive par <li>.

$resultat =$pdo->query("SELECT service FROM employes group BY service"); // ou cette 2eme façon: $resultat =$pdo->query("SELECT DISTINCT service FROM employes");
debug($resultat);

echo 'Les services d\'employes sont:' . $resultat->rowCount()  .  '<br>';
echo '<ul>';

while ($employes = $resultat->fetch(PDO::FETCH_ASSOC)){


    echo '<li>' . $employes['service'] .  '</li>';

}
echo '</ul><hr>';

//----------------------------------------------------------------------------
echo '<h2> 06-Afficher les résultas de la requête dans une table HTML </h2>';
//----------------------------------------------------------------------------
?>
<style>
    table,tr,td,th{
        border:1px solid;
    }
    table{
        border-collapse: collapse;
    }
</style>
<?php
$resultat = $pdo->query("SELECT * FROM employes ORDER BY salaire ASC");

echo '<table>';
    //La ligne des entêtes:
    echo'<tr>';

        echo '<th>ID</th>';
        echo '<th>Prenom</th>';
        echo '<th>Nom</th>';
        echo '<th>Sexe</th>';
        echo '<th>Service</th>';
        echo '<th>Date d\'embauche</th>';
        echo '<th>Salaire</th>';
        
        //Les lignes du tableau :

while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)){ //La boucle while avec le fetch permet de parcourir l'objet $resultat.On crée un tableau associatif $employe à chaque tour de boucle.
    echo '<tr>';
    debug($employe);
        foreach($employe as $info){ // $employe étant un tableau ,on peut le parcourir avec une foreach.La variable $info prend les valeurs successivement à chaque tour de boucle.
            echo '<td>' . $info . '</td>';
        }

}

    echo'</tr>';
    
echo '</table>';

// Quand on fait 1 tour de while,on fait à l'interieur 7 tours de foreach pour parcourir 1 employé.Quand la while a parcouru la totalité de $resultat,alors fetch()retourne false et la while s'arrête.tout le code du dessus sert à afficher toute la table de données.



//La requete de dessous permet d'ajouter une personne au tableau

// $resultat = $pdo->exec("INSERT INTO employes (prenom,nom,sexe,service,date_embauche,salaire)VALUES('Samia','Ouali','f','informatique','2020-03-09',2000)");

// echo 'Nombre d\'enregistrements affectés par la requête :' . $resultat . '<br>';

// // echo 'Dernier id généré en BDD:' .$pdo->lastInsertId();

// $resultat = $pdo-> exec("DELETE FROM employes WHERE prenom= 'John' AND nom = 'Doe' ");


//--------------------------------------
echo '<h2> 07-Requêtes préparées </h2>';
//--------------------------------------
//Lesrequêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête.Ainsi vous évitez au (SGBD veut dire SYSTEME DE GESTION DE BASE DE DONNEES) (de répéter toutes les phases analyse / interprétation/exécution de la requête (gain de performance).

//Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL (ce que nous verrons dans un chapitre ulterieur).

$nom = 'sennard';

//Une requête préparée se réalise en trois étapes:
//1- On prepare la requête :

$resultat =$pdo->prepare("SELECT * FROM employes WHERE nom = :nom");//prepare permet de préparer la requête sans l'exécuter.Elle contient un marqueur:nom qui est vide et attend une valeur.$resultat est à cette ligne encore un objet PDOStatement.

//2- On lie le marqueur à la variable $nom :
$resultat->bindParam(':nom', $nom); //bindParam()permet de lier le marqueur à la variable $nom.Notez que cette méthode ne reçoit qu'une variable.On ne peut pas y mettre une valeur fixe comme "sennard" par exemple.Si vous avez besoin de lierle marqueur à une valeur fixe,alors il faut utiliser la méthode bindValue().Exemple:$resultat->bindValue(':nom','sennard');



//3- On execute la requête:
$resultat->execute(); //Permet d'éxécuter toute la requête préparée avec prepare().
debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);//On ne fait de boucle ici car il n'y a qu'un seul Sennard.
debug($employe);
echo $employe['prenom']  .  '   ' . $employe['nom']  .   ' du service '  .  $employe['service']   .   '<br>';

/*
    Valeurs de retour:
    prepare ()retourne toujours un objet PDOStatement(jeu de résultat)

    execute():
        Succès : true
        Echec : false
*/

//-----------------------------------------------------
echo '<h2> 08-Requêtes préparées sans bindParam </h2>';
//-----------------------------------------------------

$resultat = $pdo->prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");//Preparation de la requête.

$resultat->execute(array(
                    ':nom' => 'chevel',
                    ':prenom' => 'daniel'
                ));//On peut se passer de bindPram()et associer les marqueurs à leur valeur directement dans un tableau passé en argument de execute().

debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);//Pas de boucle car nous avons qu'un seul Daniel Chevel.

debug($employe);
echo $employe['prenom'] . ' ' . $employe['nom']  .  ' est du service   ' . $employe['service'] . ' . ';



