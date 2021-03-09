<?php
/*
    
*/
require('config.php');
require('function.php');

echo date('d');


?>
<!DOCTYPE html>
<html>
<head>
	<title>ouverture</title>
</head>
<body>
	<p>
<?= horaires($creneaux) ?>

</p>
</body>
</html>