<?php
/*
    serialize(value) ---> fenc transformer un tableau en string
    unserialize(str) ---> fenc : transforme un string en tab
*/

$infos=[
	'name' => 'sofiane',
	'firstname'=> "Gherab",
	's_age'=> 21,

];
@$birthday = $_POST['birthday'];
 setcookie("birthday", $birthday , time()+3600*24 );
$age  = date('Y')-$birthday;

 setcookie("infos", serialize($infos) , time()+3600*24 );
@$user = htmlspecialchars($_POST['user']) ; 
setcookie('utilisateur',$user,time()+3600*60*24);
@$email_nwsltr = htmlspecialchars($_POST['email'] );
if (isset($email_nwsltr) && !empty($email_nwsltr) && filter_var($email_nwsltr , FILTER_VALIDATE_EMAIL) &&  $age >= 18 ) {
	file_put_contents('email_de_gens.txt', "$email_nwsltr \n" , FILE_APPEND );
	header('location:page2.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Newsletter</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="clss">
<h1> S'inscrire à la newsletter</h1>
<p>inscrivez vous à la newsletter et recevez votre Email quotidien, remplissez le champ ci dessous .</p>
<form action="index.php" method="post">
		<p><label for="user">Prenom</label> : <input class="inpt" type="text" name="user" id="email" required></p>

	<p><label for="adress">Email</label> : <input class="inpt" type="email" name="email" id="email" required></p>
	
	<label for="birthday"> saisissez votre date de naissence</label>
	<select name="birthday" id="birthday" class="inpt"> 
	<?php  for ($i= date('Y')-8 ; $i > 1919 ; $i--  ) : ?>
	<option  value="<?= $i ?>" > <?= $i ?>  </option>
	<?php endfor ; ?> 
	</select>
	 <br> 
	<input type="submit" class="btn" value="S'inscrir">
	 


</form>

<pre> <?php print_r(unserialize($_COOKIE['infos'] ) )   ; ?> </pre>
<pre> --------------------------- </pre>
<pre> <?php print_r($_POST )   ; ?> </pre>


</div>
</body>
</html>
