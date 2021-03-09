<?php 
// Login 

if (!empty($_SESSION)) {
		header('location:BLOG');
	
}

if (isset($_POST) && !empty($_POST)) {
	require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'Login.php');
	$Login = new Login(htmlentities(@$_POST['user']) , htmlentities(@$_POST['pass']) );
	 $Youlogin = $Login->Youlogin();
	if ($Youlogin) {
	
	$_SESSION = $Login->Info();
	header('location:BLOG') ;

	}
}


?>
<h2 class="text-center my-4">Connectez Vous </h2>
<form class="text-center  my-4" method="post" action="">
	<p>Saisissez votre nom d'utlisateur et mot de passe </p>
  <input type="text" name="user" placeholder="username"><br>
    <input class=" mt-2" type="password" name="pass" placeholder="password"><br>
  <button class="btn btn-primary  my-4" >Se Connecter  </button><br>
<?= (isset($_POST)&& !empty($_POST) )?(@$Login->ToHTML() ):('')  ?> 

<a href="" class=" my-4"> Vous avez Oublié Votre Mot de passe ? </a>
<p class="mt-5">Toujours pas inscrit ? <a href='signup' class=" btn btn-success">inscrivez vous</a></p>


</form>
<!--
	Fatal error: Uncaught Error: Call to a member function ToHTML() on boolean in C:\xampp\htdocs\Views\login\index.php:31 Stack trace: #0 C:\xampp\htdocs\Public\index.php(35): require() #1 {main} thrown in C:\xampp\htdocs\Views\login\index.php on line 31

-->