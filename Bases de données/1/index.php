<?php
/*
index
  * video 31
  *PDO -> obj c yakk rebi des bases de données XD
  *errorInfo -> obj recupere les erreurs

  *query() ->OBJ envoie des commendes 

  *fetch()-> OBJ recupere les resultat du query()
  *fetchall()-> OBJ recupere tout ( en tableau)
  *fetchall(PDO::FETCH_OBJ) -> recupere en forme d'OBJ

*/

  @$dopost = htmlspecialchars($_GET['dopost']) ;
  @$name = htmlspecialchars($_GET['name']);



require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'db_config.php' );

$pdo = new PDO($db_DSN , $db_USER , $db_PASS ) ;
$query = $pdo->query('select * from blog_post ');
if ($query ==false ) {
	echo "<pre> ERREUR : ";
	var_dump($pdo->errorInfo() );
	echo "</pre>";
	die(' ERROR SQL ');
}

$result = $query->fetchall(PDO::FETCH_OBJ) ; 
 



$date = new datetime('@'.time());
 $date = $date ->format('Y-m-d-H-i');

 if (isset($name)&& isset($dopost) && !empty($dopost) && !empty($name) ) {
if (strlen($name)<= 45){
  
  $newpost= <<<MESSAGE
  INSERT INTO `blog_post`(`user_name`, `date_publication`, `content_post`)
 VALUES
  ( ` $name`, ` $date   `, `$dopost ` );
MESSAGE;

    $pdo->query( $newpost);
    header('location:index.php');    
    /*
    return <<<SUCSESS
    <div class='alert-success alert'> Publiée ! </div>
SUCSESS;
*/

 }else{ 
  /*
  return <<<DANGER
<div class='alert-danger alert'> Nom trop grand </div>
DANGER;
*/

}

 }

/*
 [0] => stdClass Object
        (
            [id_post] => 1
            [user_name] => moh_most
            [date_publication] => 2019-12-17
            [content_post] => fihom discord a mes frear ? 
        )

*/




?>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>

<div class="container">

<h1 class="mt4-sm">Viole Psychologique </h1> 
<ul>
<?php foreach($result as $post ):  ?>
<li> <strong>  <?=  $post->user_name ; ?></strong><em class="small"> <?= $post->date_publication ?> </em> </li>
<p><?=  $post->content_post ; ?>   </p>

<?php endforeach ;  ?>
</ul>
<div class="form-group">
	<form accept="" method="get">
	<input type="text" name="name"  placeholder="votre Nom" required class=" form-text">
<input type="text" name="dopost"  placeholder="votre COmentaire" required class="form-text ">
<input type="submit" name="ok" class="btn btn-primary" value="Publier">
</form>
</div>
</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>