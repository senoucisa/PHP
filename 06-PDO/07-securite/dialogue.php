<?php
//----------------------------------------------------------
// Cas pratique : un formulaire pour poster des commentaires
//-----------------------------------------------------------
//Objectif : proteger la requête SQL dont les données proviennent de l'internaute.

/*
Modélisation de la BDD:
    nom de la BDD : dialogue
    nom de la table : commentaire 
    champs : id_commentaire             INT PK AI 
            pseudo                       VARCHAR (20)
            message                       TEXT
            date_enregistrement       DATETIME 

*/
//2.Connexion a la base de données et traitement du formulaire


$pdo = new PDO ('mysql:host=localhost;dbname=dialogue',// driver mysql (IBM,ORACLE,ODBC....),nom du serveur(host),nom de la BDD (dbname)
                'root',//pseudo de la BDD
                '', //mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Pour afficher les erreurs SQL dans le navigateur.
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//Pour définir le charset des échanges avec la BDD
                ));
        if(!empty($_POST)){// si $_POST n'est pas vide c'est que le formulaire a été envoyé
            // print_r($_POST);

            //5.Traitement contre les failles JS (XSS)ou les failles css.
            //Nous faisons injection CSS suivante:
            // <style>body{display:none;}</style>
            //Pour se prémunir de ses failles nous faisons:
            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
            $_POST['message'] = htmlspecialchars($_POST['message']);//Cette fonction prédéfinie transforme les caractères spéciaux en entités HTML : 
            // le < devient &lt;
            //le > devient &gt;
            // le & devient &amp;
            //Les caracteres spéciaux étant transformés,les balises <script> et <style> deviennent inoffensives car non éxécutable.










            //Nous faisons d'abord une requête qui n'est pas protégée contre les injections

            // $resultat = $pdo->query("INSERT INTO commentaires (pseudo,date_enregistrement,message)VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");//NOW()est une fonction SQL qui retourne la date de l'instant présent.

            //4.Nous faisons l'injection SQL suivante dans le champ message: '); DELETE FROM commentaires;# // ce code permet de vider la table.
            //pour s'en prémunir nous faisons une requête preparée qui neutralise les injections de type SQL:
            $resultat =$pdo->prepare("INSERT INTO commentaires(pseudo,date_enregistrement,message)VALUES (:pseudo,NOW(), :message)");
            $resultat->execute(array(
                ':pseudo' => $_POST['pseudo'],
                ':message' => $_POST['message'],
            ));
            //comment ça marche ?Le fait de mettre des marqueurs dans la requête permet de ne pas concaténer les instructions SQL d'origine et celle qui serait injectée.Ainsi elles ne peuvent plus s'exécuter successivement.De plus en liant les marqueurs à leur valeur dans execute(),PDO les neutralise automatiquement,les transformant en strings neutres inoffensifs.







        } // fin du if (!empty($_POST))





//1. Formulaire HTML
?>
<h1>Votre message</h1>
<form method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo']  ?? ''; ?>">
    <br>

    <label for="message">Message</label>
    <textarea name="message" id="message"><?php echo $_POST ['message'] ?? '' ; ?></textarea>
    <br>

    <input type="submit">

</form>
<?php
//3. Affichage des commentaires
$resultat = $pdo->query("SELECT pseudo,message,date_enregistrement FROM commentaires ORDER BY date_enregistrement DESC");

echo'<h2> Nombre de commentaires :' . $resultat->rowCount() . '</h2>';

while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<pre>';
    print_r($commentaire);
    echo '</pre>';

    echo '<div> Par ' . $commentaire['pseudo'] . 'le' . $commentaire['date_enregistrement'] . '</div>';

    echo '<div>' .$commentaire['message'] . '</div><hr>';

}

