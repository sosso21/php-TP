<?php
/*
    -  fopen($pathfile , 'r'); --> function lecture de fichier
     -fclose($ressource); --> -_- faut vraiment que j'explique?
     -  fread($ressource, 10 ); --> permet de lire 10 caractere
     -  fseek(handle, offset) --> faire naviguer le curseur
     - fstat(fichier.txr) --> info sur les fichier
     - echo fgets($ressource); ++> lire une ligne
     fwrite($ressource, 'coucou '); ---> ecrire !! attention au mode fopen(filename, mode)

*/
$pathfile  = __dir__ . DIRECTORY_SEPARATOR . 'Index.txt' ;
$ressource = fopen($pathfile , 'r+');
// echo fread($ressource, 10 );
//var_dump(fstat($ressource) );
echo fgets($ressource);
fwrite($ressource, 'coucou ');
 
fclose($ressource);