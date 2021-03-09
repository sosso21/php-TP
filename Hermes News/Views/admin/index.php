<?php

$table = ["user",'post','categorie'];


$order = strtolower(htmlentities(@$infoRooter['ordre'] ));
if ( in_array( $order, $table )) {
	$requet= $pdo->query("SELECT * FROM $order ");
	$results  = $requet->fetchall(PDO::FETCH_ASSOC);


}

if (empty($_SESSION)) {
	header('location:blog');
}

?>
<h2>Espace adminin</h2>
<p>Bonjour <?= $_SESSION['username'] ?> !! </p>


<div class="row"> 
<div class="col-sm-2 col-md-3 col-lg-4"> 
<a href="admin_ordre=user" class="btn my-2"> Gestion Des utilisateurs</a> 

<a href="admin_ordre=categorie" class="btn my-2">  Gestion Des Categorie</a>

<a href="admin_ordre=post" class="btn my-2"> Gestion Des Post</a>
</div>
<div class="col-sm-10 col-md-9 col-lg-8 "> 
	<form class="text-right my-2" action="" method="post">
		<input  type="text" name="q" placeholder="search">
		<button class=" btn btn-primary"> search</button>
	</form>

<?php if(!empty($infoRooter['ordre'])): foreach($results as $result): ?>
		<div class="text-center my-4 ">
			<strong><?= @$result['name'] ?><?= @$result['username'] ?></strong>
			<p><?= (!empty(@$result["is_admin"]))?('Admin'):('') ?> </p>
			<div  >
			<a href="<?= $_GET ?>_modify=<?= $result['id'] ?>" class="btn btn-success"><?= (!empty($result['username']))?('Mettre/Retirer des admin'):('Modifier') ?></a>
			<a href="<?= $_GET ?>_del=<?= $result['id'] ?>" class="btn btn-danger">Supprimer </a>
		</div>
		</div>
	<?php endforeach ; endif;  ?>

</div>



