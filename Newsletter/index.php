<?php

@$email_nwsltr = htmlspecialchars($_POST['email'] );
if (isset($email_nwsltr) && !empty($email_nwsltr) && filter_var($email_nwsltr , FILTER_VALIDATE_EMAIL) ) {
	file_put_contents('email_de_gens.txt', "$email_nwsltr \n" , FILE_APPEND );
	header('location:page2.html');
	

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
	<p><label for="adress">Email</label> : <input class="inpt" type="email" name="email" id="email" required></p>
	<input type="submit" class="btn" value="S'inscrir">
</form>
</div>
</body>
</html>
