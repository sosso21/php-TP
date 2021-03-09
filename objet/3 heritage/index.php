<?php
/*

*/
require('class'.DIRECTORY_SEPARATOR.'Compteur.php');
require('class'.DIRECTORY_SEPARATOR.'Double.php');

$ficher = "comteur".DIRECTORY_SEPARATOR.'compteur.txt';
$compteur = new Compteur($ficher);
$compteur->increment() ;
echo $compteur->recuperer();

$recupererdouble = new Double($ficher) ;
echo "<br>";
 echo $recupererdouble->recupdouble(); 


?>
