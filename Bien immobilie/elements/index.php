<?php
/*
index
  * video 37
*/
//Variable de BAses
require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'db_config.php' );
$v = $_GET['v'] = $_GET['v'] ?? 0 ;
$requete = " SELECT * from h_imb   where  id_bien  is not null " ;
@$q = str_replace ('+' ,' ' ,htmlentities($_GET['q']) ) ?? NULL ;
(isset($q))?($link=str_replace(' ', '+', "&q=$q")):($link=null);


// Si on cherche une ville , Adress , Produit
if (isset($q) && !empty($q)) {
   $requete .= "  AND(  adress  like '%$q%'  or  city  like '%$q%'  or  imb_name  like '%$q% '  ) " ;
}

//on fait la requete
$requete.="limit 10 OFFSET $v ";
$pdo = new PDO($db_DSN , $db_USER , $db_PASS ) ;
  $request = $pdo->prepare( $requete );
  $request->execute();

// si ca beug on recoit une erreur
if ($request ==false ) {
	echo "<pre> ERREUR : ";
	var_dump($pdo->errorInfo() );
	echo "</pre>";
	die(' ERROR SQL ');
}
//on affiche
$results = $request->fetchall(PDO::FETCH_OBJ) ; 

/*
echo "<pre>";
echo $requete;
// print_r($results);
// echo "vmax = $v";
echo "</pre>";

*/
echo http_build_query([$_GET['q']] );


?>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>

<div class="container">

<h1 class="mt4-sm"> Biens immobiliés </h1> 
<form class=".form-row " method="get" action="">
  <input type="text" name="q" placeholder="recherche">
  <button class="btn btn-primary" >chercher </button>
</form>
<table class="table table-striped table-sm"> 
  <thead> 
        <tr>
        <th> <a class='btn-link'  href="index.php?action=id"> id </a></th>
        <th> <a class='btn-link' href="index.php?action=name"> Nom</a></th>
          <th> <a class='btn-link' href="index.php?action=price"> Prix </a></th>
          <th> <a class='btn-link' href="index.php?action=adress">  Adresse </a> </th>
          <th> <a class='btn-link' href="index.php?action=city">  Ville </a> </th>
        </tr>
      </thead>
      <tbody>
<?php foreach($results as $result ):  ?>
<tr>
  <th><?= $result->id_bien ; ?> </th>
  <td><?= $result->imb_name ; ?> </td>
  <td><?=  number_format($result->price,0,'',' ' ) ;?> DZD </td>
  <td><?= $result->adress  ; ?> </td>
  <td><?= $result->city  ; ?> </td>

</tr>

<?php endforeach ;  ?>
</tbody>
</table>

<a class='btn-link btn  ' href="index.php?v=<?= ($_GET["v"]>=10 )?($_GET["v"]-10):($_GET['v'] ) ?><?= $link ?> "> precedent</a>
<a class='btn-link btn' href="index.php?v=<?=  ($_GET["v"]<90 && !empty($results) )?($_GET["v"]+10):($_GET['v']) ?><?= $link ?> ">suivant </a>

</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>