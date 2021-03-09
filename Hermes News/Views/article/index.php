<?php 
// article //

require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'TimeHelp.php');
$date = new TimeHelp();

$request = $pdo->prepare("SELECT * FROM post WHERE slug = ?  ");
$request->execute(array($infoRooter['slug']));
$result= $request->fetch(PDO::FETCH_ASSOC);


if (empty($_SESSION)) {
	header('location:blog');
}

?>
<h2> <?= $result['name'] ?> </h2>
<time class="small pt-2" datetime="<?=  date('Y-m-d-H:i', $result['c_date'] ) ?>"><?= $date->Dfftime($result['c_date'])  ?> </time>
<p class="py-5"> <?=  $result['content'] ?></p>


<!--
	 [id] => 6
    [name] => article 4  
    [slug] => Article-4 
    [content] =>   f fshfhfshfhs hhgfhg fggfhgfshgghfghs fsgffyfgyf fyggfsy gfsyfgyfgyfgy fsyfgyfgyfygfsyf fgyfsgfsfsgfsgyfsgyfsgyfsgyfsygfsfsgfgyygfgf ycxrsvqhycgqgyqgygdqdsfffqsviq i fq fqdst fqqfIFSD CTQGFVGCFDTFDGCVX 
    [c_date] => 1585009994

-->
