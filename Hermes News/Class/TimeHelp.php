<?php
/*TimeHelp

*/
/**
 * 
 */
class TimeHelp
{
	
	public 	function Dfftime($time)
	{
	$d1 = new DateTime();	
$d2 = new DateTime('@' . $time);
$diff = $d1->diff($d2,true);
//echo "il y a  $diff->days  jrs de difference " ;
//echo "il y a  $diff->y année  {$diff->m}  mois   et {$diff->d} jrs de difference " ;
$phrase = 'il y a ';

$v =1  ;
if ( !empty($diff->y ) && $v >= 1  ) {
	$phrase .= $diff->y .' ans ';
	$v--;
}if (!empty($diff->m ) && $v >= 1 ) {
	$phrase .= $diff->m .' mois ';
	$v--;
}if (!empty	($diff->d  ) && $v >= 1 ) {
	$phrase .= $diff->d .' jours ';
	$v--;
}if (!empty	($diff->h  ) && $v >= 1 ) {
	$phrase .= $diff->h .' heurs ';
	$v--;
}if (!empty	($diff->i ) && $v >= 1 ) {
	$phrase .= $diff->i .' minutes ';
	$v--;
}



return $phrase ;


	}
}



