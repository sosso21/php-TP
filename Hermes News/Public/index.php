<?php

// define value
if (session_status()!=2) {
	session_start();
	session_regenerate_id(true);
}

define('_MICROTIME', microtime(true));
define("ROOTPATH",   dirname(__dir__).DIRECTORY_SEPARATOR );
define("VIEWPATH",   dirname(__dir__).DIRECTORY_SEPARATOR .'Views'.DIRECTORY_SEPARATOR);
$mypage = __dir__.DIRECTORY_SEPARATOR.'404.php';


@$url = strtolower(htmlentities($_GET['url']))  ;
(!$url)?($url='blog'):('');

require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'Rooter.php');
$infoRooter = new Rooter();
$infoRooter = $infoRooter->Info_Page($url);

 $page_title = $infoRooter['page_title'];



require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
 $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;

require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'header.php');
require( @$infoRooter['mypage']);
require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'footer.php');
