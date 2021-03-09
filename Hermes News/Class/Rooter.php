<?php 

//mb_substr_count('haystack--11-11--', "-")-->4
/**
 * 
 */
class Rooter
{
	
	function Info_Page($url)
	{
		$p_info = explode('_', $url );
		$info = [];
for ($i=1; $i < count($p_info) ; $i++)  {
	$a = explode( "=", $p_info[$i]);
	$info += [$a['0']  => @$a['1'], ];
	
	}
	if (mb_substr_count($p_info['0'] , "-")) {
		$info['slug'] = $p_info['0'];
		$p_info['0'] = 'article';
	}

$directory=[
	'categorie','blog','signup','login','logout','admin','add','article'
];
if (!in_array($p_info['0'] , $directory)) {
	$p_info['0'] = 'blog';
  }

  $info['mypage'] = VIEWPATH.$p_info['0'].DIRECTORY_SEPARATOR.'index.php';
   $info['page_title'] = ucfirst($p_info['0'])  ;
    return $info ;
	
	}
}
