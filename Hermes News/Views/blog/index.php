<?php
// Blog


$title_cat = 'Blog';
if (isset($infoRooter['cid'])) {
     $request = $pdo->prepare("
 SELECT * from categorie_post
   left join post ON 
   categorie_post.id_post = post.id
 where categorie_post.id_categorie = ? ");
      $id_categorie=$infoRooter['cid'];
      $request->execute(array($id_categorie));
      $title_cat = $infoRooter['cname'];

}else{
$request = $pdo->query("SELECT * FROM post ");

}

$result= $request->fetchall(PDO::FETCH_ASSOC);

require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'TimeHelp.php');
$date = new TimeHelp();


// SESSION
if (!empty($_SESSION['id']) ) {

$id = $_SESSION['id'];
$request2 = $pdo->query("SELECT id , username , is_admin from user WHERE id = $id  ");
$_SESSION= $request2->fetch(PDO::FETCH_ASSOC);

$is_admin = $_SESSION['is_admin'] ;
$username = $_SESSION['username'] ;

}
if (empty($_SESSION)) {
	header('location:LOGOUT');
}

//ESsAI


?>
<h2><?= $title_cat ?></h2>
<p class="mt-4"> Bonjour <?= $username ?> !</p>
<div class="row ml-4 mr-4">
	<?php foreach($result as $article): ?>
		<div class="text-center my-4 col-sm-6 col-md-4 col-lg-3">
			<h3><?= $article['name'] ?></h3>
			<time class="small" datetime="<?=  date('Y-m-d-H:i', $article['c_date'] ) ?>"><?= $date->Dfftime($article['c_date'])  ?> </time>
			<p class="mr-2 text-truncate"> <?=  $article['content'] ?></p>
			<a href="<?= $article['slug'] ?>" class="ml-auto  btn btn-primary ">Lire l'article</a>
		</div>
	<?php endforeach ; ?>
	


</div>

<!--

  [0] => Array
        (
            [id] => 1
            [name] => article 1 
            [slug] => Article1
            [content] => hello 
            [c_date] => 2020-03-21 01:10:32
        )
--> 



