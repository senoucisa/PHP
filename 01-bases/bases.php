<style>
    h2{
        border-top:1px solid navy;
        border-bottom:1px solid navy;
        color:navy;
    }

    
</style>

<?php

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

echo $maVar ?? 'valeur par défaut';






