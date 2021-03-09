<?php
/*
index
  * video 39
*/

//require
require(__dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'db_config.php' );


//variable
$user = htmlentities(@$_POST['user']) ?? null ;
$pass = hash('sha256' ,htmlentities(@$_POST['pass'])) ?? null ;



if (isset($user)&& isset($pass) && !empty($user)&& !empty($pass) ) {
  $request ="select * from `users` where(user_name ='$user'AND pass ='$pass')"   ;
$pdo = new PDO($db_DSN , $db_USER , $db_PASS ) ;  
 $request ="select * from `users` where(user_name ='$user'AND pass ='$pass')"  ;
  $prepare = $pdo->prepare($request );
  $prepare->execute();
$result = $prepare->fetch(PDO::FETCH_ASSOC);
  if (!empty($result)) {
  	session_start();
	session_regenerate_id(true);
	$_SESSION['id'] =$result['id_user'];
    
    ($result['is_admin'])?($dir= 'admin' ):($dir= 'user');
 header('location:'.$dir.'.php') ;
  }elseif (empty($result)) {
    $errormessage = <<<HTML
   <p class='Alert-danger'> USER / Mot de pass erroné </p>
HTML;

 }
}


echo "<pre>";
print_r(@$result);
echo "<br>--------<br>";
echo @$dir;
echo "<br>--------<br>";
print_r(@$_SESSION);
echo "</pre>";






?>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>
<div class="container">

<h1 class="mt4-sm"> CONNEXION </h1> 
<form class="form-row" action="" method="post">
  <input type="type" name="user" placeholder="USER" required="">
  <input type="password" name="pass" placeholder="Password" required="">
<button class="btn btn-primary">Login</button>
</form>
<?= @$errormessage?> 

</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>