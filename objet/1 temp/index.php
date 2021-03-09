<?php
/*
        Datetime()---> obj -affiche la date 
        format--()--> methode pour modifier le format	de presentasion
        modify() ---> methode pour modifieer la date
        strtodate('le nombre a ajouter ex : +1minth', "le time stamp")--> function	 pour treansformer une chane de catac en time( )
        abs() --> function	pour afficher la valeur absolue ; |x| 
        floor --> function	affichant la valeur basse ex : floor('3.1415926') : 3
         $date->diff($date2,true);
                      diff --> methode pour calculer la difference 
                      ('le truc a comparer ', 'eceque on veut valeur absolut')

        $diff->days  : methode pour afficher la diff en days
        echo "il y a  {$diff->y} ans {$diff->m}  mois   et {$diff->d} jrs de difference " ; 



*/

/*

$date = new Datetime();
function dump($varuable)
{
echo "<pre>";
var_dump($varuable);
echo "--------------------------";
print_r($varuable);
echo "</pre>";
echo "****************** <br>" ;
}

dump($date);

echo "<br> la date du jour:  " . $date->format('d/m/Y') .'<br>';

$date2 = new DateTime();
 $date2->modify('+1month') ;
echo "<br> la date dans un mois:  " .  $date2->format('d/m/Y') .'<br>';

/*

$time = time();
$time2  = strtotime("+1month",$time);
 //echo date("d/m/-Y------",$time) ;



$days = floor(abs($time - $time2)/(24*3600));
echo "il y a  ".$days . ' de jours entre les deux dates ' ;
*/


$date1='2020-01-10';
$date2 = '1998-09-21';

$d1 = new DateTime($date1);
$d2 = new DateTime($date2);
$diff = $d1->diff($d2,true);
//echo "il y a  $diff->days  jrs de difference " ;
echo "il y a  $diff->y année  {$diff->m}  mois   et {$diff->d} jrs de difference " ;








?>