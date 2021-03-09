<?php
/*   
   PHP_EOL ---> end of line
   explode("le separateur","la chaine de caractere")---> function mettant les lignes en tableau
   count($ligne) --> compte le nombre de ligne
   trim() ---> function pour supprimer tt les espace , retour 	 lcfirst( ligne 

*/
$lesplats = [];
$lesingrediants = [];
$lesprix = [];
$lecture = file_get_contents('Index.tsv');
$lignes = explode(PHP_EOL, $lecture);
foreach ($lignes as $key => $ligne) {
	$ligne = explode("->" , trim($ligne));
	$lesplats[]= $ligne['0'];
	$lesingrediants[] = $ligne['1'];
	$lesprix[] = $ligne['2'];
}
$k=0;
$L = count($lignes) ;
function vues_d_c()
{ 
if (file_exists('compteur.txt')) 
	$vues_d_c = file_get_contents('compteur.txt');
else
	$vues_d_c = 0 ;
$vues_d_c++;
file_put_contents('compteur.txt' ,$vues_d_c );
echo  $vues_d_c;
}
echo date('Y-m-d');


function vues_d_j()
{ 
	$date = file_get_contents("date.txt");
	if (  date('Y-m-d') !==  $date ) 
	{
			$statistics= $date . "  => ".  file_get_contents('compteurdujour.txt') . "\n" ;
			 file_put_contents('statistics.txt' , $statistics ,FILE_APPEND );
			 file_put_contents("date.txt",date('Y-m-d'));
		    file_put_contents('compteurdujour.txt' , "1" );
	}
	else
	{
		if (file_exists('compteurdujour.txt')) 
			$vues_d_j = file_get_contents('compteurdujour.txt');
		else
			$vues_d_j = 0 ;
		$vues_d_j++;
		file_put_contents('compteurdujour.txt' ,$vues_d_j );
		echo  $vues_d_j;
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cantine n 3ami Said</title>
</head>
<body>
<h1>Menu</h1>
<?php while ($k  < $L ) { ?>

<p> <h2> <?= $lesplats[$k] ?></h2>  <?= $lesprix[$k] ?> DZD <br>
 <?= $lesingrediants[$k] ?> </p>
<?php $k+=1;  } ?>
<footer>
 nombre de visites depuis Création : <?php vues_d_c() ; ?> </footer>
 nombre de visites du jours : <?php vues_d_j() ; ?> </footer>

</body>
</html>