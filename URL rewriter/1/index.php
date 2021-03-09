<?php
/*
index
  * video 37
*/
//Variable de BAses
require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'db_config.php' );
require(  __dir__.DIRECTORY_SEPARATOR.'Class'.DIRECTORY_SEPARATOR.'SORTHELP.php' );

$v = $_GET['v'] = $_GET['v'] ?? 0 ;
$requete = " SELECT * from h_imb   where  id_bien  is not null " ;
@$q = str_replace ('+' ,' ' ,htmlentities($_GET['q']) ) ?? NULL ;


// Si on cherche une ville , Adress , Produit
if (isset($q) && !empty($q)) {
   $requete .= "  AND(  adress  like '%$q%'  or  city  like '%$q%'  or  imb_name  like '%$q% '  ) " ;
}

// ORDER BY

if (!in_array(@$_GET['sort'] ,["id_bien",'imb_name', 'price','adress','city'])) {
  $_GET['sort'] ='id_bien' ;
}

  if ( !in_array(@$_GET['dir'], ['ASC','DESC'] )) {
    $_GET['dir'] = "ASC";

}
$sort = $_GET['sort']  ;
$dir = $_GET['dir'] ;
$requete .=" ORDER BY $sort $dir "  ;


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

$results = $request->fetchall(PDO::FETCH_OBJ) ; 


//lien
$link = '&'.http_build_query( ['sort'=>$sort ,'dir'=>$dir,"q"=>$q]);



echo "<pre>";
print_r($_GET);
//echo http_build_query($_GET);
echo "</pre>";


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
        <th><?= SORTHELP::SORT("id_bien",'ID',$_GET) ?> </th>
        <th><?= SORTHELP::SORT("imb_name",'NOM',$_GET) ?></th>
          <th><?= SORTHELP::SORT("price",'Prix',$_GET) ?></th>
          <th><?= SORTHELP::SORT("adress",'Adresse',$_GET) ?></th>
          <th><?= SORTHELP::SORT("city",'Ville',$_GET) ?> </th>
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
<a class='btn-link btn' href="index.php?v=<?=  ($_GET["v"]<90 && !empty($results) )?($_GET["v"]+10):($_GET['v']) ?><?= $link ?>">suivant </a>


</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>