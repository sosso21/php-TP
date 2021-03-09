<?php 
/* Sign up
*/
if (!empty($_SESSION)) {
		header('location:BLOG');
}

if (isset($_POST) && !empty($_POST)) {
	require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'Register.php');
	$subscribe = new Register(htmlentities(@$_POST['user']) , htmlentities(@$_POST['pass1']) ,  htmlentities(@$_POST['pass2']) , htmlentities(@$_POST['conditions']) );
	if(  $subscribe->isbeenregister() ){
		
	$_SESSION = $subscribe->Infouser();
	header('location:BLOG') ;
		

	}	
}


?>
<h2 class="text-center my-4"> Insrivez Vous </h2>
<form class="  text-center  my-4" method="post" action="">
	<p>Saisissez les champs suivant </p>
  <input type="text" name="user" placeholder="Nom d'utilisateur" required=""><br>
    <input class=" mt-2" type="password" name="pass1" placeholder="password" required="" ><br>
        <input class=" mt-2" type="password" name="pass2" placeholder="retapez votre mot de passe " required><br>
        <input id="conditions" type="checkbox" name="conditions"><label for="conditions" required >j'accpte et j'ai connaissence <a href=""> les conditions et treme dd'utilisations</a></label> <br>

  <button class="btn btn-primary  my-4" >Se Inscrivez Vous  </button><br>
<?=  (isset($_POST) && !empty($_POST))?( $subscribe->ToHTML()):('') ; ?>

<p class="mt-5">Déjà Insrit ? <a href='Login' class=" btn btn-success">Connectez Vous</a></p>


</form>


