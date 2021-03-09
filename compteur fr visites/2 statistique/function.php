<?php


function vues_d_c()
{ 
if (file_exists('compteur.txt')) 
	$vues_d_c = file_get_contents('compteur.txt');
else
	$vues_d_c = 0 ;
$vues_d_c++;
file_put_contents('compteur.txt' ,$vues_d_c );
echo  $vues_d_c;
}


function vues_d_j()
{ 
	$date = file_get_contents("date.txt");
	if (  date('Y-m-d') !==  $date ) 
	{
			$statistics= $date . "  - ".  file_get_contents('compteurdujour.txt') . "\n" ;
			 file_put_contents('statistics.txt' , $statistics ,FILE_APPEND );
			 file_put_contents("date.txt",date('Y-m-d'));
		    file_put_contents('compteurdujour.txt' , "1" );
	}
	else
	{
		if (file_exists('compteurdujour.txt')) 
			$vues_d_j = file_get_contents('compteurdujour.txt');
		else
			$vues_d_j = 0 ;
		$vues_d_j++;
		file_put_contents('compteurdujour.txt' ,$vues_d_j );
		echo $vues_d_j ;
	}

}
function print_view( $year ='total' , $month=0 ,$day=0 )
{
	$result = 0;


	if ($year == "total") 
	{
		return file_get_contents("compteur.txt");
	}
	else
	{
		$stats = file_get_contents("statistics.txt");
		$lignes = explode("\n", $stats );
		foreach ($lignes as $k ) 
		{
			$ligne = explode("-", trim($k ) );
			
			if ($year == $ligne['0'] && !$month && !$day ) 
			{
				$result += @$ligne['3'] ;
			}
			elseif ($year == $ligne['0'] && $month == $ligne['1'] && !$day ) 
			{
				$result += $ligne['3']  ;
			}
			elseif ($year == $ligne['0'] && $month == $ligne['1'] && $day == $ligne['2'] ) 
			{
				$result += $ligne['3']  ;
			}



		}
		echo  $result;	
	}

}

?>