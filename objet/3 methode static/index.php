<?php
/* 
    la diffenrece entre methode static et la normal :
      c'est que au lieu de faire //PARTIE 1 //
      On va directemnt inviquer la methode (// partie 2 )

*/ 


require('class'.DIRECTORY_SEPARATOR.'Form.php');
/*
  // partie1
$form = new Form();
$form->checkbox('demo', 'demo',[]); 
*/
// -----------------------------------------// 

  //partie2 -1
echo Form::checkbox('demo', 'demo',[]) ;


  //partie2 -2
echo Form::$_class ;



echo "<pre>";
// print_r();
echo "</pre>";


?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>title</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="content">
	</div>

</body>
</html>