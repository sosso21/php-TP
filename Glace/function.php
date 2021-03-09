<?php
function checkbox(string $name,string $value,array $data):string
{
	
	$atrib = '';
	if (isset($data[$name]) && in_array($value, $data[$name])) {
		$atrib  .= 'checked';	
	}
	return <<<HTML
	<input type="checkbox" name="{$name}[]" value="$value" $atrib >
HTML;

}


function radio(string $name,string $value,array $data):string
{
	
	$atrib = '';
	if (isset($data[$name]) && $value == $data[$name]) {
		$atrib  .= 'checked';	
	}
	return <<<HTML
	<input type="radio" name="{$name}[]" value="$value" $atrib >
HTML;

}

function dump($variable)
{
	echo "<pre>";
	echo var_dump($variable);
	echo '----------------' .'<br>' ;
	echo "----------------".'<br>'  ;
	echo print_r($variable);
	echo "</pre>";
}