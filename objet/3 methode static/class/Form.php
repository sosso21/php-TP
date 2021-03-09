<?php

/**
 *qd on utilise une method / obj normpal 
    on fait reference avec $this->
  *qd  on utilise des method/obj satic
     on fait refernce avec self::
 */

class Form
{
	public static $_class = 'form-class'; 
 public static function checkbox(string $name,string $value = null ,array $data = [] ):string
{
	$atrib = " class='".self::$_class . "'"  ;
	if (isset($data[$name]) && in_array($value, $data[$name])) {
		$atrib  .="checked";	
	}
	return <<<HTML
	<input   type="checkbox" name="{$name}[]" value="$value" $atrib >
HTML;

}


	
	
}
?>
