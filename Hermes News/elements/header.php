<?php 
/*
   herader

 */
require(ROOTPATH. 'Class'.DIRECTORY_SEPARATOR.'Menu.php');
$menu = New Menu();
$menu = $menu->ToHTML();


if (empty($page_title)) {
	$page_title = "HERMES";
}





?>
<!DOCTYPE html>
<html lang="fr" class="h-100 ">
<head>
	<script type="text/javascript">
		var a = 'salut '
		var mark = {
			nom:'mark',
			age:'21'
		}
		console.log(a + mark.nom)
			if( mark.age > 18){
				console.log(' tu est majeur')	
		}else if(ùark.age == 18 ){
			console.log(' tu vien d\' etre majeur')
		}
		else{
			console.log('tu es mineurs')
		}
		// autre condition
		if(mark.age > 18 && (mark.age <  25 || mark.age > 75  ) )
		{
			console.log('tu as acces au tarif réduit')
		}
		switch( mark.age ){
			case 18: 
			  console.log('bravo t\'est majeur ')
			   break
		    case 25 :
			  console.log('bravo tu as un carre  siecle  ')
			   break
			case 50 :
			  console.log('bravo tu as un demi siecle  ')
			   break
		
			default : 
			console.log('bravo  ')
		
		} 


	</script>
	<meta charset="utf-8">
	<title><?= $page_title ; ?> </title>
	<link rel="stylesheet" type="text/css" href="elements/bootstrap.css">
</head>
<body class="d-flex flex-column h-100  ">	

<nav class="navbar navbar-expand-sm bg-degrad navbar-dark  " >

	<a href="blog" class='navbar-brand'> <h1> HERMÈS </h1> </a>
	<div > <?= $menu ?></div> 
 </nav>
<div class="container mt-4 ">

