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

<p> <h2> <?= $lesplats[$k] ?></h2>  <?= $lesprix[$k] ?> <br>
 <?= $lesingrediants[$k] ?> </p>
<?php $k+=1;  } ?>
<pre>

</body>
</html>