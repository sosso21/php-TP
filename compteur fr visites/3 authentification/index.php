<?php
/*   
   PHP_EOL ---> end of line
   explode("le separateur","la chaine de caractere")---> function mettant les lignes en tableau
   count($ligne) --> compte le nombre de ligne
   trim() ---> function pour supprimer tt les espace , retour 	 lcfirst( ligne 

*/
session_start();

// SESSION
@$login =  $_SESSION['logi'] = htmlspecialchars($_POST['email'] );
@$mdp = htmlspecialchars($_POST['mdp']);
$error = "";
echo md5('0000');

if ($login=="sofiane2@bk.ru" && md5($mdp)=='4a7d1ed414474e4033ac29ccb8653d9b' )
 {
	$_SESSION['admin'] = true ;
	$_SESSION['auth']= true ;
	header('location:statistique.php');
}
else{
$error = 'Login ou mdp incorrecte';

} 




//

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

require('function.php');
// echo date('Y-m-d');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cantine n 3ami Said</title>
	<link rel="stylesheet" type="text/css" href="wtyle.css">
</head>
<body>
	<div class="content"> 
		<div >
	<a class="link" href="statistique.php">Statistique</a>
<form method="post" action="Index.php">
	<p><label for="login">login </label>: <input type="email" name="email" required=""> </p>
	<p><label for="mdp">Mot de passe </label>: <input type="password" name="mdp" required=""> </p>
		<input type="submit" name="submit">

</form>
<p> <?php echo $error ; ?></p>
<h1>Menu</h1>
<?php while ($k  < $L ) { ?>

<p> <h2> <?= $lesplats[$k] ?></h2>  <?= $lesprix[$k] ?> DZD <br>
 <?= $lesingrediants[$k] ?> </p>
<?php $k+=1;  } ?>

<footer>
 nombre de visites depuis Création : <?php vues_d_c() ; ?> </footer>
 nombre de visites du jours : <?php vues_d_j() ; ?> </footer>
</div> </div>

</body>
</html>