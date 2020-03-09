<?php
//-------------------------
//La superglobale $_COOKIE
//-------------------------

/*
Un cookie est un petit fichier(4ko max)déposé par le serveur web sur le poste de l'internaute,et qui contient des informations.
Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies.

PHP permet de récupérer tres facilement les données contenues dans un cookie:ses informations sont stochées dans la superglobales $_COOKIE.
Un cookie etant sauvegardé sur le poste de l'internaute,il peut etre modifié,volé,ou détourné.On n'y met donc pas d'informations sensibles(mot de passe,panier d'achat'références bancaires ...).
*/
//Mise en pratique :stocker la langue sélectionneée dans un cookie.

//2- On determine la langue a un fichier "fr" par defaut:
if(isset($_GET['langue'])){ // si une langue est dans l'url,c'est que l'internaute a cliqué sur un des liens.On enverra donc cette langue dans le cookie:
    $langue = $_GET['langue'];

}elseif(isset($_COOKIE['langue'])){ // sinon si on a reçu un cookie appelé "langue" alors la langue du site sera la valeur du cookie

    $langue = $_COOKIE['langue'];
}else {
    $langue='fr'; // sinon si l'internaute n'a pas choisi de langue,et qu'il arrive pour la premiere fois,on lui met "fr" par defaut.
}

//3-Envoie du cookie avec la langue:
echo time();//donne le timestamp de maintenant:date exprimée en secondes écoulées depuis le 01/01/1970 et maintenant.

$un_an = time() + 365*24*60*60; // on prend le timestamp de maintenant auquel on ajoute 1 an exprimée en seconde pour déterminer la date d'expiration du cookie.

setcookie('langue', $langue, $un_an); //on envoie notre cookie appellé "langue",avec pour contenu £langue,et pour date d'expiration $un_an.

//4-A ffichage de la langue:
echo '<h2>langue du site:' . $langue . '</h2>';

//Il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie.Pour rendre un cookie invalide,on utilise setcookie()avec le nom du cookie conçerné,et en mettant une date d'expiration à 0 ou antérieur à aujourd'hui.

//Pour visualiser les cookies dans le navigateur: onglet "stockage" dans Firefox,ou "application" dans Chrome.

//1-Le HTML
?>
<h1>Votre langue</h1>
<ul>
<li><a href="?langue=fr">Français</a></li>  <!-- on envoie la langue choisie par l'url :la valeur "fr" est réceptionnée dans la superglobale $_GET.--> 
<li><a href="?langue=es">Espagnol</a></li>
<li><a href="?langue=it">Italien</a></li>
<li><a href="?langue=en">Anglais</a></li>

</ul>