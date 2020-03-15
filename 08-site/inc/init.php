<?php
//Ce fichier sera inclus au début de tout les scripts du site.

//Connexion à la BDD


$pdo = new PDO ('mysql:host=localhost;dbname=site',// driver mysql (IBM,ORACLE,ODBC....),nom du serveur(host),nom de la BDD (dbname)
                'root',//pseudo de la BDD
                '', //mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Pour afficher les erreurs SQL dans le navigateur.
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//Pour définir le charset des échanges avec la BDD
                ));
//Créer une session ou l'ouvrir si elle éxiste
session_start();

//Définir le chemin du site:
define('RACINE_SITE','/PHP/08-site/');//constante que définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost.Ainsi nous écrirons tous les chemins des src ou des href en absolu avec cette constante.Chez un hébergeur vous mettriez ('/') si votre site se trouve à la racine de votre hébergement (pas dans des sous dossiers)

//Variable poue afficher du HTML:
$contenu = ''; //on se sert de cette variable partout sur le site.

//Inclusions des fonctions:
require_once 'functions.php';