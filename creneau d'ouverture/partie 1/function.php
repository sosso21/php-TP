<?php
/*   
    
*/


function dump($variable)
{
	echo "<pre>" ; 
	echo var_dump($variable);
	echo "-------------------------";
	print_r($variable);
	echo  "</pre>" ;
	echo"-------------";
}

function horaires($creneaux) 
{
	$phrases = [];
	foreach ($creneaux as $creneau) {
		$phrases[]  = " de {$creneau['0'] }h à {$creneau['1']}h ";}

			return 'Ouvert de :'. implode( ' et ' , $phrases);

}