<?php

// ouverture de la session :
session_start();  // ici la session n'est pas recréée car elle existe deja grâce au session_start ()lancé dans le fichier session1.php.

echo'La session est accessible dans tous les scripts du site :';
print_r($_SESSION);

// Ce fichier n'a rien à voir avec session1.php ,il n'y a pas d'inclusion (include ou require),il pourrait être dans n'importe quel dossier,s'appeler n'importe comment,les informations contenues dans la session sont accessibles grâce au session_start().