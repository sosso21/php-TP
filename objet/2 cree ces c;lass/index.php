<?php
require('class'.DIRECTORY_SEPARATOR.'Crenaux.php');
$Crenau = new  Crenau(8,12) ;
$Crenau2 = new Crenau(10, 18);


echo "<pre>";
print_r($Crenau->inclucrenau($Crenau2) );
echo "</pre>";


?> 
