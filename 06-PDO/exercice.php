<h1>Les commerciaux et leur salaire</h1>

<?php



$pdo = new PDO ('mysql:host=localhost;dbname=entreprise',// driver mysql (IBM,ORACLE,ODBC....),nom du serveur(host),nom de la BDD (dbname)
                'root',//pseudo de la BDD
                '', //mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Pour afficher les erreurs SQL dans le navigateur.
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//Pour définir le charset des échanges avec la BDD
                ));
function debug($var){
    echo'<pre>';
        print_r($var);
    echo'</pre>';
}
//-Vous affichez dans une liste <ul><li> le prenom,le nom et le salaire des employés appartenant au service commercial(un <li> par commercial).
//-Vous affichrz le nombre de commerciaux.

$service = 'commercial';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE service = :service")
;
$resultat->bindParam(':service', $service); 
$resultat->execute();
debug($resultat);
echo 'Les personnes appartenant au service commercial sont :' . $resultat->rowCount() . '<br>'; //permet de compter le nombre de ligne dans le jeu de resultat qui provient de la requête de sélection.
echo '<ul>';
while($employe = $resultat->fetch(PDO::FETCH_ASSOC)){ //Ici on fait un while parce qu'il y a plusieurs commerciaux.
    // debug($employe);

    echo '<li>' .  $employe ['nom']  .  '   '  . $employe['prenom']  . '  gagne  '  .  $employe['service'] . ' ' .  $employe['salaire'] . ' ' . '€</li>';
}


debug($employe);
echo '</ul><hr>';
//avant de commencer un exercice sur un fichier vierge commencer par apporter
//1- la fonction debug
//2- connexion à la BDD (faire un copier coller et pas oublié de changer le nom de la base de données si on reste pas dans la meme base.)