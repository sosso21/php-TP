<?php
/* 
    LOGIN

*/

/**
 * 
 */

class Login 
{
	public function __construct($id)
	{
		require(dirname(__dir__).DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'db_config.php' );

$pdo = new PDO($db_DSN , $db_USER , $db_PASS ) ;	
 $request ="select * from `users` where(id_user ='$id' )"  ;
  $prepare = $pdo->prepare($request );
  $prepare->execute();
$result = $prepare->fetch(PDO::FETCH_ASSOC);
if (!empty($result)) {
	return true;
}
	}


}