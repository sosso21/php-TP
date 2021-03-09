<?php
session_start();

if (!$_SESSION['auth'] || !$_SESSION['admin'] ) 
{
	header('location:index.php');
	exit();
}

if ($_POST['logout']) {
	session_unset();
session_destroy();
session_write_close();
setcookie(session_name()," ",0 , null , null ,false , true );
session_regenerate_id(true);
	header('location:statistique.php');

}

//
require('function.php');
@$year  = $_GET['year'] ;
@$month =$_GET['month'];
@ $day = $_GET ["day"];


  if (!empty( $year) &&  $year !== 'total' ) 
{
 $mois =[
 		"Janvier",
 		"Février",
 		"Mrs",
 		"Avril",
 		"Mai",
 		"Juin",
 		"Juillet",
 		"Août",
 		"Septembre",
 		"Octobre",
 		"Novanmbre",
 		"Decembre",

];
}
if (!empty($month))
{
	$jrs=[
		31,
		29,
		31,
		30,
		31,
		30,
		31,
		31,
		30,
		31,
		30,
		31,
	];
	$jr = $jrs[$month-1] ;

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Statistiques</title>
	<link rel="stylesheet" type="text/css" href="wtyle.css">
</head>
<body>
	<pre><?php print_r($_SESSION ) ; ?> </pre>
	<div class="content">	
		<div class="gauche"> 
			<?php $atrib =  ($year == "total")?("actif"):(""); ?>
			<a  class="<?= $atrib; ?> btnp link" href="?year=total">Total</a>
		<?php for ($i=date('Y') ; $i > 2010 ; $i--): ?>
			<?php $atrib =  ($i == $year)?("actif"):(""); ?>
			<a class="<?= $atrib; ?> btnp link" href="statistique.php?year=<?= $i; ?>"><?= $i; ?></a> 
			<?php if($i==$year): ?>
			<?php foreach (@$mois as $k => $lemois): ?>
			<?php $atrib =  ($k+1 == $month)?("actif"):(""); ?>
		<a class="btnp link <?= $atrib ; ?> " href="statistique.php?year=<?= $i; ?>&month=<?= $k+1 ; ?>"> <?= $lemois ; ?> </a>
		<div class="day">
		<?php if ($month== $k+1 ):
		for ($n=1 ; $n <= $jr ; $n++) : ?>
			<?php $atrib =  ($n == $day)?("actif"):(""); ?>
			<a  class="<?= $atrib; ?> lday  link" href="statistique.php?year=<?= $i; ?>&month=<?= $k+1 ; ?>&day=<?= $n ;?> "> <?= $n ;?> </a>
		
		<?php endfor ; endif ; ?>
	</div>
	<?php endforeach ; ?>
<?php endif ;?>
		<?php endfor ; ?>
	</div>
	
	<div class="droite">
<p> <?= print_view($year , $month , @$_GET ["2"]  ) ; ?> vues   </p>
</div>
<form method="post" action="">
	<input type="submit" name='logout'>
</form>
</div>


</body>
</html>