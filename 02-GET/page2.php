<?php

//---------------------------
// La superglobale $_GET
//---------------------------
/* $_GET représente les données qui transitent par l'URL. Il s'agit d'une superglobale, et comme toutes les superglobales, d'un tableau (array).
"superglobale" signifie que cette variable est disponible partout dans le script, y compris au sein des fonctions (pas besoin de faire "global $_GET).
Les informations transitent dans l4IRL selon la syntaxe suivante :
    page.php?indice1=valeur1&incdiceN=valeurN
Quand on receptionne les données, $_GET de remplit selon le schéma suivant :
    $_GET = array('indice1' => 'valeur1', 'indiceN' => 'valeurN');
*/
print_r($_GET);// pour vérifier les donnés reçues
if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){ // si existe les indices "article" , "couleur" et "prix" dans $_GET , donc dans l'URL c'est qu'un produit a été sélectionné. On peut alors afficher ses informations. 
    echo '<h1>' . $_GET['article'] .'</h1>';
    echo '<p>' . $_GET['couleur'] .'</p>';
    echo '<p>' . $_GET['prix'] .' euros </p>';
} else{
    echo '<p> Produit inexistant.... </p>';
}
// $_GET est utlisé dans les boutiques pour afficher le détail d'un produit . En réalité nous passons le numéro du  produit dans l'URL, les informations provenant de la base de données.