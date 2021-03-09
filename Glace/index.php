<?php
$deviner = 2109 ;
$resultat='' ;

@$value =htmlspecialchars($_GET['value']);

 if (isset($value) && !empty($value)   ) 
 {
 	if ($value < $deviner)
 		$resultat .= "trop petit";
 	elseif ($value > $deviner) 
 		$resultat .= "trop Grand";
 	else
 		$resultat .=  "bravo";
 }

$gouts =
[
	'chocolat' => 10 ,
	'vanille' => 15 ,
	'citron'=> 20 ,
];
$recipiants = 
[
	'cornet' => 5,
	'goblet' => 10,
];

$suplements =
[
	"pepite de chocolat" => 5,
	"chantillie" =>5,
];

require_once('function.php');

$ingrediants = [];
$total = 0;


/*
if (isset($choix_gout) ) 
{
	foreach ($choix_gout as $gout) 
	{
		if (isset($gouts[$gout])) 
		{
			$ingrediants[] = $gouts[$gout];
			$total += $gouts[$gout] ;
		}
	}
}
*/
$choix_gout = $_GET['gout'];
$choix_recipiant = $_GET["recipiant"];
$choix_supplement =  $_GET['suplement'];

$choix = 
[
	$choix_gout ,
	$choix_recipiant ,
	$choix_supplement
];

foreach ($choix as $typechoix ) {
	
if (isset($typechoix) ) 
{
	foreach ($typechoix as $valeur) 
	{
		if (isset($gouts[$valeur])) 
		{
			$ingrediants[] = $gouts[$valeur];
			$total += $gouts[$valeur] ;
		}
		if (isset($recipiants[$valeur])) 
		{
			$ingrediants[] = $recipiants[$valeur];
			$total += $recipiants[$valeur] ;
		}
		if (isset($suplements[$valeur])) 
		{
			$ingrediants[] = $suplements[$valeur];
			$total += $suplements[$valeur] ;
		}
	
	}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>_GETlaces</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Commandes </h1>
	<form action="index.php" method="get">
		<p> <label>inserer un nombre </label> : <input type="number" name="value"> </p>
		<input type="submit" name="submit" value="ok">
		<p><?= $resultat  ?></p>
	</form>
	<br>
	<form action="index.php" method="get" >

		<br>
		<h2>Choix Du Gout </h2>
		<?php foreach ($gouts  as $gout => $prix)  : ?>
		<p>
			<label>  <?php echo $gout ; ?></label> <?= checkbox('gout', $gout , $_GET)  ?> --> <?php echo $prix ; ?> DZD
		</p>
		<?php  endforeach ; ?>

		<br>
		<h2>Choix Du récipiant </h2>
		<?php foreach ($recipiants  as $recipiant => $prix)  : ?>
		<p>
			<label>  <?php echo $recipiant ; ?></label> <?= radio('recipiant', $recipiant , $_GET)  ?> --> <?php echo $prix ; ?> DZD
		</p>
		<?php  endforeach ; ?> 


		<br> 
		<h2> Choix Des Suppléments </h2>
		<?php foreach ($suplements  as $suplement => $prix)  : ?>
		<p>
			<label>  <?php echo $suplement ; ?></label> <?= checkbox('suplement', $suplement , $_GET)  ?> --> <?php echo $prix ; ?> DZD
		</p>
		<?php  endforeach ; ?>
		<input class="submit" type="submit" name="submit" value="ok">
		
		<p>le total est de   <?=  $total ?> DZD </pre>
	</form>

</body>
</html>