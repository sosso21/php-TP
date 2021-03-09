<?php

 @$logout = htmlspecialchars($_GET['logout'] );

if ( !empty($logout) && $logout  == 'yes' ) 
{
	setcookie('utilisateur',"",time()-1 ) ; 
	 //unset($_COOKIE['utilisateur']);
	header('location:index.php');
	     
}
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<title>Succès</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
	<div class="clss">

<p class='sucsess'>c'est fait <?= $_COOKIE['utilisateur'] ?> !! <br> 
 insription validé !! </p> <p> vous receverez un email chaque jours à 9h </p>

<a class="btn lien" href="?logout=yes"  > deconnecter </a>

</div>
</body>
</html>

