<?php
/* 
    SORTHELP

*/

/**
 * 
 */
class SORTHELP 
{
	


	public static function SORT($id, $label ,$data )
	{
		$symb= null ;
		 
		if ($data['sort'] == $id) {
			($data['dir']=='DESC')?($data['dir']='ASC' ):($data['dir']='DESC' ) ;
			if ($data['dir']=='DESC') {
				$symb ='v';
			}elseif ($data['dir']=='ASC') {
				$symb ='^';	
						}
			
		}
		$data['sort']= $id;
		$url =http_build_query($data);
		return <<<HTML
		<a href="index.php?{$url} "> {$label} {$symb}</a>
HTML;

	} 


	
}