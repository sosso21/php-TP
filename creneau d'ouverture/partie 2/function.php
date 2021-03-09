<?php
/*   
    
*/

require('config.php');

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
	if (empty($creneaux) ) 
	{
	 	return "<strong class='red'> Fermé </strong>"   ;
     }
	foreach ($creneaux as $creneau)
	 {
	 	
		
		$phrases[]  = " de <strong class='green'> {$creneau['0'] }h </strong> à <strong class='green'> {$creneau['1']}h </strong> ";	
	}
	//dump($creneaux);
	
	return 'Ouvert' . implode( ' et ' , $phrases);

}


function ouvertounn($creneaux)
{
	
$date_j = date('N') -1 ;
$horraires_j = $creneaux[$date_j] ;
$etat = '';
$acolade  ='';
foreach ($horraires_j as $key ) 
{
	if ($key['0'] <= date("H" ) && date('H') < $key['1'] )
	{ 
		$etat = "ouvert";
		$acolade = '<span class="green" >  ';
	 }   
	else 
	{
		$etat = "fermé";
		$acolade = '<span class="red" >  ';
	}
	    
}
return " $acolade  le magazin est actuellemnt $etat </span> " ;	
}