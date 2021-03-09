<?php
/*
index
  * video 28 





   mon mdp sur Openweither
      eliotalois
      Warzone21@
      sofianetop21.st@gmail.com


3732a02ff8cb9808cf1c9724fb704348

*/

$curl = curl_init('https://api.openweathermap.org/data/2.5/weather?q=Tirmitine,dz&APPID=3732a02ff8cb9808cf1c9724fb704348&units=metric&lang=fr');


//$curl = curl_init('https://samples.openweathermap.org/data/2.5/forecast/daily?id=524901&appid=b1b15e88fa797225412429c1c50c122a1');

 curl_setopt($curl, CURLOPT_RETURNTRANSFER , true );
$data = curl_exec($curl);
if ($data== false ) {
	var_dump(curl_error($curl));
}else{
	$data = json_decode($data, true);
	echo "<pre>";
	    print_r($data );
	echo "</pre>";
}


curl_close($curl);

?>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php' ); ?>

<div class="container">

<h1 class="mt4-sm">météo </h1> 
<p> à  <strong><?=  $data['name'] ; ?> </strong> le temp est <strong>  <?= $data['weather']['0']["description"] ; ?> </strong>  avec <?= $data['main']['temp'] ; ?>°C 
	<br> la temperature ressentie est de <?=   $data['main']['feels_like']; ?> °C 
 <br> la minimale est de   <?= $data['main']['temp_min']  ; ?>°C 
 <br> la minimale est de   <?= $data['main']['temp_max']  ; ?>°C 


  </p>

</div>
<?php require(  __dir__.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php' ); ?>