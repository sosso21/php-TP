<?php


require('config.php');
require('function.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>contact</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <ul> 
<?php foreach ($jrs as $k => $jr) : ?>
  <li class="jr"> <?= $jr ?> : <?= horaires($creneaux[$k]) ?> </li> <br>
<?php endforeach; ?>
</ul>
<p class="jr">  <?= ouvertounn($creneaux) ?> </p>

</body>
</html>
