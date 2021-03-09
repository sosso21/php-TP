<?php 

/*

*/
class Menu 
{
	
	function ToHTML()
	{
		if (!empty($_SESSION['is_admin'])) {
	return  <<<HTML
	<a href="Categorie" class='navbar-brand'>Catégorie </a>
	<a href="admin" class='navbar-brand'>Espace Administrateur </a>
	<a href="LOGOUT" class='navbar-brand'>Se Déconnecter </a>
HTML;
      
      }

		if (!empty($_SESSION)) {
	return  <<<HTML
	<a href="categorie" class='navbar-brand'>Catégorie </a>
	<a href="logout" class='navbar-brand'>Se Déconnecter </a>
HTML;
      
      }
      elseif (empty($_SESSION)) {
      	return  <<<HTML
	<a href="login" class='navbar-brand'>SE Connecter </a>
	<a href="signup" class='navbar-brand'>S'Inscrir </a>
HTML;

      }
	}
}