<style>
    h2{
        border-top:1px solid navy;
        border-bottom:1px solid navy;
        color:navy;
    }
    table, td {
    border-collapse:collapse;
    border:1px solid black;
    padding:20px;
 }
 
</style>

<?php
require_once'functions.php';

//----------------------------------
echo '<h2>Les balises PHP </h2>';

//----------------------------------
?>

<!-- // pour ouvrir un passage en PHP on utilise la balise précédente  -->

<!--//  pour fermer un passage en PHP on utilise la balise suivante:  -->

<p>Bonjour</p>  
<!-- en dehors des balises de PHP nous pouvons écrire du HTML  dans un fichier ayant l'extansion .PHP (ce n'est pas possible dans un fichier .HTML) -->

<?php
//Vous n'etes pas obligé de fermer un passage en PHP en fin de script.

//les double slash c'est pour faire des commentaires sur une seule ligne.
# pour faire un commentaire sur une seule ligne.
/*
    Pour faire des commentaires 
    sur plusieurs lignes
*/


//----------------------------------
echo '<h2> Affichages </h2>';

//----------------------------------

echo 'Bonjour <br>';

//echo est une instruction qui permet d'effectuer un affichage .Nous pouvons y mettre du HTML.Toutes les instructions se termine par un point virgule (;) en PHP.

print 'Nous sommes lundi <br>';
//Print est une autre instruction d'affichage.

var_dump('code');
print_r('');
// Ses deux fonctions d'affichage permettent d'analyser dans le navigateur le contenu d'une variable par exemple(nous en verrons l'utilisation plus tard).


//----------------------------------
echo '<h2> Variables </h2>';

//----------------------------------
//Une variable est espace mémoire qui porte un nom et qui permet de conserver une valeur.Cette valeur peut etre de n'importe quel type.
//En PHP on represente une variable avec le signe "$".

$a = 127;
//On declare la variable $a et lui affecte la valeur 127
echo gettype ($a);
//GETTYPE ()est une fonction prédefinis qui permet de voir le type d'une variable.Ici il s'agit d'un integer(entier).

echo '<br>';

$a = 1.5;
echo gettype($a);
//Ici il s'agit d'un double (nombre à virgule).

echo '<br>';

$a = 'une chaine de caractere';

echo gettype($a);
//Ici il s'agit d'un string

echo '<br>';

$a = '127';
echo gettype($a);
//Un nombre écrit entre quotes ou guillemets est interpreter comme un  string.
echo '<br>';

$a = true;
// ou false
echo gettype($a);
//Ici il s'agit s'un boolean (booléen)

//Par convention une nom variable commence par une minuscule puis on met une majuscule à chaque mot.Il peut contenir des chiffres mais jamais au début ou un "_" mais jamais au debut ni a la fin.
//Exemple: $maVariable1


//----------------------------------
echo '<h2> Concaténations </h2>';

//----------------------------------

// En PHP on concatène avec le ".". 

$x ='Bonjour';
$y = ' tout  le  monde';

//On concatène les deux variables et le string avec le point que l'ont peut traduire par "suivi de ".

echo $x . $y . '<br>';

// Concatenation et affectation combinées avec l'opérateur ".="

$prenom = 'Nicolas';
$prenom .= '-Marie';
//On ajoute la valeur "-Marie" à la valeur "Nicolas" sans la remplacer grace à l'operateur ".="

echo $prenom . '<br>';
// affiche "Nicolas-Marie"


//----------------------------------
echo '<h2> Guillemets et quotes </h2>';

//----------------------------------
$message = "aujoud'hui";
$message = 'aujoud\'hui';
// On échappe les apostrophes quand on ecrit dans les quotes simples avec \(altgr+8).

$txt = 'Bonjour';
echo"$txt tout le monde <br>";
//Dans les guillemets la variable est évaluée :c'est son contenu qui est affiché.
echo'$txt tout le monde <br>';
//Dans les quotes simples,$txt est considéré comme une chaine de caractere brute:on affiche $txt littéralement.


//----------------------------------
echo '<h2> Les constantes </h2>';

//----------------------------------
// Une constante permet de conserver une valeur sauf que celle-ci ne peut pas changer .C'est à dire qu'on ne pourra pas la modifier durant l'exécution du script.Utile par exemple pour conserver les parametres à la BDD de facon certaine.

define('CAPITALE_FRANCE', 'Paris');
//Par convention une constante s'écrit toujours en MAJUSCULES.Ici on déclare la constante CAPITALE_FRANCE à laquelle on affecte 'Paris'.

echo CAPITALE_FRANCE . '<br>';
// affiche Paris
//Autre syntaxe pour déclarer une constante:

const TAUX_CONVERSION =6.55957;
//on peut aussi déclarer une constante avec le mot clé const.

echo TAUX_CONVERSION . '<br>';
//affiche 6.55957.

//Exercice: Vous afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables.

$couleur ='Bleu -';
$couleur .='Blanc-';
$couleur .='Rouge';

echo $couleur . '<br>';


//-----------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';

//-----------------------------------------

$a = 10;
$b =2;

echo $a + $b . '<br>';// 12

echo $a - $b . '<br>';//8

echo $a * $b .'<br>';//20

echo $a / $b . '<br>';//5

echo $a % $b . '<br>';//0 modulo = reste de la division entiere .Exemple :3%2 =1 car si on a 3 billes repartie sur 2 personnes ,il nous en reste 1.

//-----------
// Opérations et affectations combinées :

$a = 10;
$b = 2;

$a += $b; //équivaut à $a = $a + $b soit $a = 10 + 2, $a vaut dons 12 au final.
$a -= $b; // équivaut à $a = $a - $b soit $a = 12 - 2 ,$a vaut donc au final 10
//on utilise ces operateurs dans les paniers d'achat par exemple.

//il existe aussi des operateurs (*=) (/=) (%=) 

//-------------- 
//Incrémenter et décrémenter :
$i = 0;
$i++; //on augmente $i de 1
$i--; // on diminue $i de 1 ($i vaut donc 0 ici)


//------------------------------------------------
echo '<h2> Les structures conditionnelles </h2>';

//------------------------------------------------

$a = 10;
$b = 5;
$c = 2;

// if........else:

    if ($a > $b){ //si la condition est vraie,c'est à dire que $a est superieur à $b,alors on execute les accolades qui suivent:
        echo '$a est superieur a $b <br>';

    } else { //sinon si la condition est fausse ,on execute le else:
        echo 'Non c\'est $b qui est superieur ou égal à $a <br> ';
    }

    //L'opérateur AND qui s'écrit &&
    if($a > $b && $b > $c){ // si $a est superieur a $b et que dans le meme temps $b est superieur a $c,alors on entre dans las accolades:
        echo 'OK pour les deux conditions <br>';

    }

    //L'opérateur OR qui s'écrit ||(altGr 6)

    if ($a == 9 || $b > $c){  // si $a est égal (== pour comparer en valeur)à 9 ou alors $b est superieur a $c,alors on execute les accolades qui suivent:
        echo 'OK pour au moins une des deux conditions <br>';

    } else { //sinon c'est que les 2 conditions sont fausses.
        echo 'Les deux conditions sont fausses <br>';
    }

    // if ......elseif.....else: 

    if($a == 8){// si $a est égal à 8
        echo 'reponse 1: $a est egal à 8';

    }elseif($a != 10){ // sinon si $a est different de 10
        echo 'reponse 2:$a est different de 10';

    }else { //sinon,si nous sommes pas entrés dans le if ni dans le elseif,on entre dans le else:
        echo 'reponse 3 :les 2 conditions précédentes sont fausses <br>';

    }

    //------------------------

    //La condition ternaire :
    //La ternaire est une autre syntaxe pour écrire un if.....else. 
    $a =10;

    echo  ($a == 10) ? '$a est égal à 10 <br> ' : '$a est différent de 10 <br>' ;  // dans la ternaire le"?" remplace le if, et le ":" remplace le else.Ainsi on dit :si $a est égal à 10,on affiche la premiere expression, sinon la seconde.
//--------------
//Comparaison avec == et ===

$varA = 1; // integer (un nombre entier)
$varB = '1'; // string

if ($varA == $varB){ // La condition est vrai car en valeur 1 et '1' sont équivalents
    echo '$varA est égal à $varB en valeur uniquement <br>';
}

if($varA === $varA){ // La condition est fausse car 1 et '1' sont différents en type.
    echo'$varA est égal à $varB en valeur et en type (strictement égaux) <br>';

}else {

    echo 'Les deux variables sont différentes en valeur ou en type (pas strictement égales) <br>';
}

//Pour mémoire l'opérateur "=" est un signe d'affevtation.

//-----------
// isset() et empty():
//Définitions :
//empty()vérifie si c'est vide: 0, '', NULL, false, non défini 
//isset()vérifie si c'est défini,et non NULL

$var1 = 0;
$var2 = '';

if(empty($var1)){
    echo 'var1 est vide(0, string vide,NULL,false ou non défini) <br>';
}
if (isset($var2 )){
    echo '$var2 existe et est non NULL <br>';
}

//Différence entre isset et empty :si on supprime les déclarations des variables $var1 et $var2,empty reste vraie car $var1 n'est pas définie.isset devient fausse car $var2 n'est pas définie non plus.

//Utilisation:empty pour verifier qu'un champ de formulaire est rempli.
//Utilisation:isset pour vérifier l'existence d'une variable avant de l'utiliser.

//---------
// L'opérateur NOT qui s'écrit "!" :
$var3 = 'quelque chose';
if(!empty($var3)) {// "!" pour NOT qui est une négation.Ainsi quand on a !true cela revvient à FALSE,et quand on a !FALSE cela revient à TRUE.
    echo '$var3 n\'est  pas vide <br>'; //Ici on entre dans la condition ,car $var3 n'est pas vide

}

//---------
// PHP7 : Afficher une variable sous condition d'existence avec l'operateur "??"

echo $maVar ?? 'valeur par défaut'; // on affiche la variable $maVar si elle existe,sinon on affiche le string qui suit.
//Exemple d'utilisation : pour laisser les valeurs saisies dans un formulaire.


//-------------------------
echo '<h2> switch </h2>';

//-------------------------
//La condition switch est une autre syntaxe pour écrire un if....elseif...else quand on veut comparer une variable à une multitude de valeurs.

$langue = 'chinois';

switch ($langue){
    case 'français'://on compare $langue à la valeur des "case" et on éxécute le code qui suit si elle correspond:
        echo 'Bonjour !';
    break; //est obligatoire pour quitter le switch une fois un case éxecuté.
    case 'italien':
        echo 'Ciao !';
    break;
    case 'espagnol':
        echo 'Hola !';
    break;
    default://on tombe dans le cas par defaut si on entre pas dans le case précédent
    echo 'Hello ! <br>';
    break;  
    
}

//Exercice:vous réécrivze ce switch avec des if ....pour obtenir exactement le meme resultat.


if($langue == 'français') {
    echo 'bonjour !';

}
elseif ($langue == 'espagnol'){
    echo 'helo ! <br>';
}
elseif($langue == ' italien'){
    echo 'Ciao ! <br>';
}
else {
    echo 'Hello !<br> ';
}


//--------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';

//--------------------------------------
//Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP.

//----------
// strpos():veut dire la position d'un string

$email1 = 'prenom@site.fr';
echo strpos($email1, '@');//strpos()indique la position 6 du caractere '@' dans la chaine $email1 (on compte a partir de 0).

echo '<br>';
$email2 = 'samia';
echo strpos ($email2, '@');
var_dump(strpos($email2, '@'));//Grace au var_dump on aperçoit que la fonction retourne FALSE car le caractere "@" n'est pas trouvé dans $email2.Notez que quand on fait un echo de false,cela n'affiche rien dans le navigateur.var_dump est une instruction d'affichage améliorée que l'on utilise quand on developpe,puis qu'on retire.
echo '<br>';
//------------
//strlen() donne la longueur de chaine de caractere

$phrase = 'mettez une phrase ici';
echo strlen($phrase); //strlen()permet de retourner la taille de la chaine de caractère (nombre d'octets occupés,un caractère accentué valant 2 octets,et un espace 1 octet).
echo '<br>';
//------------
//substr() sous string(la partie intérieur du string)

$texte = 'Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte Vous mettez ici un tres long texte ';
echo substr($texte, 0, 20) . '...<a href="#"> lire la suite </a>';//Coupe une partie du texte,en partant de la position 0 ici et sur 20 octets.

//--------------------------------------
echo '<h2> Fonctions utulisateurs </h2>';

//--------------------------------------
//Des fonctions sont des morceaux de codes écrit dans des accolades et portant un nom.On appelle une fonction au besoin pour exécuter le code qui s'y trouve.

// Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut exécuter plusieurs fois le même traitement .On parle alors de "factoriser " son code.

function separation (){ // On déclare une fonction avec le mot clé function suivi du nom de la fonction et d'une paire de parenthèses()qui accueillerons des paramètres ultérieurement.
    echo '<hr>';
}
separation(); // Pour exécuter une fonction (donc le code qui s'y trouve),on l'appelle en écrivant son nom suivi d'une paire de parenthèses().

//--------
// Fonction avec paramètres et return:
function bonjour($prenom, $nom){ // $prenom et $nom sont les paramètres de notre fonction.Ils permettent de recevoir une valeur car il s'agit de variables de réception.
    return 'Bonjour '  . $prenom  . ' '  .  $nom . ' ! <br>'; // RETURN permet de sortir la phrase "Bonjour..." de la fonction et de la renvoyer à l'endroit ou la fonction est appelée.
}
echo bonjour('John', 'Doe'); //Si la fonction attend des valeurs,il faut obligatoirement les lui donner,et dans le même ordre que les paramètres.Ces valeurs s'appellent des arguments.Ici on met un echo car la fonction nous retourne la phrase mais ne l'affiche pas directement.

// On peut remplacer les arguments par des variables (provenant d'un formulaire par exemple):
$prenom = 'Pierre';
$nom = 'Giraud';
echo bonjour ($prenom , $nom); // Ici les 2 arguments sont variables et peuvent recevoir n'importe quelle valeur.

//Exercice:vous écrivez une fonction qui multiplie un nombre 1 par un nombre 2fournis lors de l'appel .Cette fonction retourne le résultat de la multiplication.Vous affichez le résultat.

function multiplication($chiffre1, $chiffre2){
    return 'resultat  de :  ' . $chiffre1 . ' multiplié par ' . $chiffre2  .  ' est de ' . $chiffre1  *  $chiffre2  .  '. <br>';

}

$chiffre1 = 2;
$chiffre2 = 3;
echo multiplication ($chiffre1, $chiffre2);
echo '<br> <br> <br> <br> <br> <br>';


//----------------------------------------------------
echo '<h2> Variable locale et variable globale </h2>';

//-----------------------------------------------------
//-------------------------
// Aller de l'espace local à l'espace global:
function jourSemaine(){
    $jour = 'Mardi'; // Ici nous nous trouvons dans l'espace local de la fonction .Cette variable est donc dite "locale".
    return $jour; // return permet de sortir une valeur de la fonction.
}
//echo $jour; // on ne peut pas accéder à cette variable ici car elle n'est connu qu'à l'interieur de la fonction jourSemaine().
echo jourSemaine (); // on récupère la valeur "mardi" grâce au return en fin de la fonction.
echo '<br>';
//----------------------
// Aller de l'espace global vers l'espace local:
$pays = 'France'; // Ici nous nous trouvons dans l'espace global.Cette variable est donc dite "globale".
function affichePays() {
    global $pays; // global permet d'aller chercher la variable $pays à l'exterieur de la fonction pour pouvoir l'exploiter à l'interieur.
    echo  $pays; // affiche France.
}
affichePays();


//----------------------------------------------------
echo '<h2> Structure intéractives : les boucles </h2>';

//-----------------------------------------------------
// Les boucles sont destinées à répeter du code de façon automatique.

//Boucle While :
$i = 0;// valeur de départ de la boucle
while ($i < 3){ // tant que $i est inferieur à 3,on entre dans la boucle.
    echo $i . '----'; //affiche "0---1---2---".
    $i++;// On oublie pas d'incrémenter la variable $i pour que la condition d'entrée devienne fausse à un moment donné (évite les boucles infinies).
}

//Exercice: à l'aide d'une boucle while,vous affichez les années de 1920 à 2020 dans menu déroulant.

// $i = 1920;
// echo '<select>';
// while($i < 2020){
//     echo '<option> '. $i. '</option>';
//     $i++ ;
// }
// echo '</select>';

echo '<br>';


// $annee = 1920; //point de départ de la boucle
// echo '<select>';
// while($annee <= 2020){
//     echo '<option>' .  $annee;. '</option>';
//     $annee++;
// }
// echo '</select>';


$i = 2020;
echo '<select>';
while($i > 1919){
    echo '<option> '. $i. '</option>';
    
    $i-- ;
}
echo '</select>';

echo '<br>';


//-----------
// La boucle do while :
//La boucle do while a la particularité de s'exécuter au moins une fois,puis tant que la condition de fin est vraie.

$j=0; // Valeur de depart de la boucle.

do {
    echo 'Je fais un tour de boucle <br>';
    $j++;

}while ($j > 10);// La condition renvoie false tout de suite ,pourtant la boucle à bien tourné une fois .Attention au ";" après le while.

echo '<br>';

//-----------
// La boucle for :
// La boucle for est une autre syntaxe de la boucle while.

for($i = 0; $i < 3; $i++){ // on trouve dans les parenthèses () de la for : La valeur de départ;la condition d'entrée dans la boucle;La variation de $i (incrémentation, décrémentation).
    echo $i . '----';
}

echo '<br>';


for ($i = 0; $i < 20; $i+=5){
    echo $i . '---';
}
echo '<br>';

//Exercice:Affichez les mois de 1 a 12 à l'aide d'une boucle for dans un menu déroulant.

echo '<select>';
    for($mois = 1; $mois < 13; $mois++){
        echo '<option>' . $mois . '</ option>';
    }
    echo '</select>';

    echo '<br>';


echo '<form>';
    echo '<label>Mois de naissance</label>';

        
echo '<select>';
for($jour = 1; $jour < 8; $jour++){
    echo '<option>' . $jour . '</ option>';
}
echo '</select>';
echo '<input type="submit">';

echo '</form>';

echo '<br>';

//1- faire une boucle for qui affiche 0 à 9 sur la même ligne 
//2- puis vous compléter la boucle précédente,pour mettre les chiffres dans une table HTML.Vous y mettrez une bordure en CSS.
// correction exercice 1 : faire des tableau avec des chiffres. (PHP) et (HTML).
?>
<table>
<tr>
<?php

for($i = 0; $i < 10; $i++){
    echo '<td>' . $i . '</td>' ;
}
?>
</tr>
</table>

<?php

echo'<br>';
// correction 2 (tout php):

echo '<table>';
    echo '<tr>';
        for ($chiffre =0; $chiffre <10; $chiffre++){
            echo '<td>'. $chiffre . '</td>';
        }
        echo '</tr>';
    echo '</table>';


//-------------------------------------
echo '<h2> Les tableaux (array) </h2>';

//-------------------------------------
//Un tableau appelé array en anglais,est une variable améliorée dans laquelle on stocke une multitudes de valeurs.Ces valeurs peuvent etre de n'importe quel type.Elles possèdent un indice dont la numerotation commence à 0.

// Déclarer un array (mèthode 1):

$liste =array('Grégoire','Nathalie','Emilie','François', 'Georges'); // Les valeurs sont séparées par une virgule.

// echo $liste; //Ne jamais utilisé cette syntaxe car mauvaise on ne peut pas traduire un (array)en (string) en PHP.

echo'<pre>';
    var_dump($liste); // Affiche le contenu du tableau avec les types 
echo'</pre>';

echo'<pre>';
    print_r($liste);// Affiche le tableau sans les types
echo'</pre>';// <pre> est une balise HTML qui permet de formater le texte.

//Pour notre besoin nous créons notre fonction personnelle d'affichage:

function debug($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

debug($liste);

//Autre façon de déclarer un array (méthode 2):

$tab = ['France','Italie','Espagne','Portugal'];
//Indices   0     1     2     3  

echo $tab[1] . '<br>'; // pour afficher une valeur du tableau on ecrit son indice dans une paire de crochets apres le nom du tableau.Ici affiche Italie.

// Ajouter une valeur à la fin d'un tableau:

$tab [] = 'Suisse'; // Les crochets vide signifient qu'on ajoute une valeur à la fin du tableau $tab.
debug($tab);// Pour vérifier que la valeur "Suisse" est présente.

//------------------
// Les tableaux associatifs:
// Dans un tableau associatif,nous pouvons choisir le nom des indices.
$couleur = array(
    'b'=> 'bleu',
    'r'=> 'rouge',
    'v'=> 'vert'
);

//pour afficher une valeur de notre tableau associatif:
    echo 'La premiere couleur du tableau est ' . $couleur['b'] . '.<br>';
    echo "La premiere couleur du tableau est  $couleur[b] <br>";// Quand un tableau associatif est écrit dans des guillemets ou des quotes il perd les quotes autour de son indice.


debug($couleur);

// Compter le nombre d'élément contenu dans un tableau:
echo 'Nombre de valeurs dans le tableau:' .count($couleur) . '<br>'; // Sa affiche 3.
echo 'Nombre de valeurs dans le tableau:' .sizeof($couleur) . '<br>'; // Sa affiche 3 aussi car sizeof()fait la meme chose que count()dont il est un alias.


//-------------------------------------
echo '<h2> La boucle foreach </h2>';
//-------------------------------------
// foreach est un moyen simple de passer en revue un tableau de façon automatique.Cette boucle ne fonctionne que sur les tableaux et les objets.

debug($tab);// Pour voir le tableau à parcourir.


foreach ($tab as $pays){ //on parcour le tableau $tab par ses valeurs.La variables $pays prens les valeurs du tableau successivement à chaque tour de boucle .Le mot clé "as" fait partie de la syntaxe,il est obligatoire.
    echo '<div>' .  $pays . '</div>' . '<br>';

}
echo '<hr>';

//La boucle foreach pour parcourir les INDICES et les VALEURS:

    foreach($tab as $indice => $pays){ // Quand il y a 2 variables apres "as" celle de gauche parcours les indices et celle de droite parcours les valeurs.(quel que soit leur noms).
        echo 'indice ' . $indice . ' correspond à ' . $pays . '<br>';

    }

// Vous declarez un tableau associatif avec les indices prenom,nom,email et telephone et vous y mettez les valeurs correspondant à un seul contact.Puis avec une boucle foreach ,vous affichez les valeurs dans des <p<,sauf le prenom qui doit etre dans un <h3>.

$renseignement = array(
    'prenom'=> 'John',
    'nom'=> 'Doe',
    'email'=> 'john.doe@hotmail.fr',
    'telephone'=> '01 48 25 41 54 '
);
debug($renseignement);

foreach($renseignement as $indice => $valeur){
    if ($indice == 'prenom'){
        echo '<h3>' . ' bonjour ' .  $valeur  . ' ! </h3>' ;
       

    }else {
        echo '<p>' . $valeur . '</p>' ;
    }  
}


//-------------------------------------------
echo '<h2> Tableau multidimensionnel </h2>';
//-------------------------------------------
//On parle de tableau multidimensionnel quand un tableau est contenu dans un autre tableau.Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
    0 => array (
        'prenom'=> 'Julien',
        'nom' => 'Dupont',
        'telephone' => '0148444758'
    ),
    1 => array(
        'prenom'=>'Nicolas',
        'nom' => 'Durant',
        'telephone' => '0112458985'
    ),
    2 => array(
        'prenom'=> 'Pierre',
        'nom'=> 'Dulac',
        
    ),

);
debug($tab_multi);
// debug($tab_multi [0]);cette formule affiche le premier sous tableau (Ici en rouge).

// Afficher la valeur "Julien" de $tab_multi:

echo $tab_multi[0]['prenom'];// Pour afficher Julien nous entrons d'abord à l'indice [0] de $tab_multi puis nous allons dans le sous tableau à l'indice ['prenom'].

echo '<br>';
echo $tab_multi[1]['prenom'];
echo '<br>';
echo $tab_multi[2]['prenom'];
echo '<hr>';

// Pour parcourir le tableau multidimensionnel on peut faire une boucle for car ses indices sont numériques:

for ($i =0; $i< count($tab_multi); $i++){ // Tant que $i est inferieur au nombre d'éléments du tableau $tab_multi (soit3)on entre dans la boucle:
    echo  $tab_multi [$i]['prenom'] . '<br>';//$i va successivement prendre la valeur 0,puis 1 puis 2,cequi permet f'afficher les 3 prénoms.
}
echo '<hr>';
// Exercice: vous affichez les trois prénoms du tableau $tab_multi avec une boucle foreach.


foreach( $tab_multi as $indice => $valeur ){
    echo  $tab_multi [$indice]['prenom'] . ' ' ;

}
echo '<hr>';
// OU 

foreach( $tab_multi as $indice => $valeur ){
    echo  $valeur ['prenom'] . ' ' ;

}
echo '<hr>';

//Exercice bonus:Vous déclarez un tableau avec les tailles S,L,M,XL.Puis vous affichez les tailles dans un menu déroulant avec une boucle foreach.



$taille = array('S','M','L','XL');

debug($taille);

echo '<form>';

echo '<label> Taille </label>';
   
echo '<select>';
<<<<<<< HEAD

foreach($taille as $indice => $valeur){
    echo '<option>' .  $valeur .  '</option>';
}
=======
    foreach($taille as $indice => $valeur){
        echo '<option>' .  $valeur .  '</option>';
    }
>>>>>>> e4ad3a16f32be2ac1370f398680963bcc8308295
echo '</select>';
echo '<input type="submit">';

echo '</form>';

echo '<br>';


//-------------------------------------------
echo '<h2>Inclusions de fichiers </h2>';
//-------------------------------------------
<<<<<<< HEAD
echo 'première inclusion:';
include 'exemple.inc.php';// Permet de faire l'inclusion du fichier dont le chemin est spécifié.En cas d'erreur lors de l'inclusion,"include" génère un warning et continue l'éxécution du script.

echo'<br>';

echo'Deuxième inclusion :';
include_once 'exemple.inc.php';// Permet de faire l'inclusion du fichier si celui-ci n'a pas encore été inclus.(on l'inclus qu'une seule fois.)

echo'<br>';
echo'troisième inclusion:';
require 'exemple.inc.php';// fait l'inclusion du fichier spécifié celui-ci est obligatoire au bon fonctionnement du site:en cas d'erreur lors de l'inclusion,"require" génère une erreur type "fatal" error et stoppe l'execution du script.

echo '<br>';

echo'Quatrième inclusion:';
require_once 'exemple.inc.php'; //"once" signifie que l'on vérifie si le fichier a déja été inclus.Si c'est le cas ,on le ré-inclut pas.

//Le ".inc" dans le nom du fichier inclus est un indicatif pour préciser aux développeurs que le fichier est destiné à etre inclus,et qu'il ne sagit pas d'une page à part entière.
=======
>>>>>>> e4ad3a16f32be2ac1370f398680963bcc8308295


bonjourSamia();

















 



