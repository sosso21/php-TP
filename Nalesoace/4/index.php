<?php
/* index
  dirname($fichier)--> function : renvois le dossier parent
  mkdir(diname, droits 777 , si on cree lesdossier parent 'true' )
  touch(filename) --> function cree fichier 


*/
use Hermes\Guestbook\Guestbook;

require_once( __dir__.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'message.php' ); 

require_once( __dir__.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Guestbook.php' ) ; 

$title = "Livre d'or ";
@$user = htmlspecialchars($_POST["user"]); 
@$comment = htmlspecialchars($_POST["comm"]);
$file = __dir__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'message.txt';
$error = [] ;
@$sucsess = '';

if (isset($comment)&& isset($user)  && !empty($comment)&& !empty($user)) 
{
	$message = new Message($user , $comment );
	if ($message->isvalid() ) {
	$sucsess = "publié !! " ;
	$sussessclass = 'alert-success alert';
	$guestbook = new Guestbook($file );
	$guestbook->addmessage($message);
	
	}
	
	else{
	
	$error = $message->geterror();
	$errorclass= 'alert-danger alert';

	}
	
}

$Commentaires= new Guestbook($file);
$Commentaires = $Commentaires->getmessage();

?>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>

<div class="container">
<h1> Livre d'or </h1>
<form action="" method="post">
    <input type="text" name="user" placeholder ="Pseudo">
    	<div class="<?= @$errorclass ; ?>"> <p> <?= @$error['username'] ; ?>  </p> </div>
	<input type="text" name="comm"  placeholder="Commentaire">
	<div class="<?= @$errorclass; ?>" > <p ><?= @$error['message'] ; ?> </p> </div>


	<button class="btn btn-primary">publier </button>
</form>

	<p  class="<?= @$sussessclass ; ?>"> <?= @$sucsess ; ?> </p> 




<?php if (!empty($Commentaires)): ?>
<h2 class="mt-4"> Vos Message </h2>
<?php foreach ($Commentaires as  $Commentaire): ?>
	<?= $Commentaire->toHTML() ; ?> <br>
<?php endforeach ; ?>
<?php endif ; ?>



</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>