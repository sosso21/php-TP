<?php
/*
user
  * video 39
*/

session_start();
session_regenerate_id(true);

require(('Class/Login.php'));
$islog = new Login($_SESSION['id']);

if (empty($_SESSION) ||  ! $islog ) 
{
	header('location:logout.php');
	exit();
}


?>

<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>
<div class="container">

<h1 class="mt4-sm"> HELLO USER </h1> 
<a class="btn btn-primary" href="logout.php">LOGOUT</a>

</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>