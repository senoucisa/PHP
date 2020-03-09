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

    $resultat = $pdo->query("SELECT*FROM employes WHERE prenom = 'Daniel'");
    /*
        Au contraire d'exec(),query() est utilisé pour faire des requêtes qui retournent un ou plusieurs resultat:SELECT.on peut aussi l'utiliser avec DELETE,UPDATE et INSERT.

    Valeur de retour:

        Si succés:query()retourne un nouvel objet qui provient de la classe PDOStatement
        en cas d'echec :sa retourne FALSE
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
$resultat = $pdo->query("SELECT*FROM employes WHERE id_employes = 417");
debug($resultat);

$employe = $resultat->fetch(PDO::FETCH_ASSOC);

echo'le service de l\'employe  dont l\'id employe = 417  est ' . $employe ['service'] . '<br>';




