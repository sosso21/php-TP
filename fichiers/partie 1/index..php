<?php
/*
    - file_put_contents('le chemin' , 'le contenu')
    - FILE_APPEND  ---> cons pour ecrire à  la fin
    -  _dir__  ----> cons pour afficher le chemin du index.php
    -DIRECTORY_SEPARATOR --> /
    - dirname() --> function pour afiicher le dossier parent

*/

$chemin1 = __dir__ . '/dossier1/dossier2/' ;
$fichier1= $chemin1 .DIRECTORY_SEPARATOR . "fichier.txt";
file_put_contents( $fichier1, ' Comment ca va ',FILE_APPEND );

$chemin2 = dirname($chemin1)  ;
echo $chemin2;
$fichier2 =  $chemin2.DIRECTORY_SEPARATOR. 'fichier.txt' ;
file_put_contents( $fichier2, ' Oui ca va  ',FILE_APPEND );
echo file_get_contents($fichier2);

 

?>