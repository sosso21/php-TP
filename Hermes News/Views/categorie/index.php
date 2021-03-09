<?php
//categorie



$request = $pdo->query("SELECT * FROM categorie ");

$result= $request->fetchall(PDO::FETCH_ASSOC);

require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'TimeHelp.php');




// SESSION

if (empty($_SESSION)) {
	header('location:blog');
}



?>
<h2>Catégorie</h2>

<div class="row text-center ml-4 mr-4">
	<?php foreach($result as $categorie): ?>
		<div class="my-4 col-sm-6 col-md-4 col-lg-3">
			<h3 ><?= $categorie['name'] ?></h3>
			
			
			<a href="blog_cid=<?= $categorie['id'] ?>_cname=<?= $categorie['name'] ?> " class=" btn btn-primary">Lire les Articles</a>
		</div>
	<?php endforeach ; ?>
	


</div>

<!--