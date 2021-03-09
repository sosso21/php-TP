<?php

// define value
define('_MICROTIME', microtime(true));
define("ROOTPATH",   dirname(__dir__).DIRECTORY_SEPARATOR );
define("VIEWPATH",   dirname(__dir__).DIRECTORY_SEPARATOR .'View'.DIRECTORY_SEPARATOR);
$mypage = __dir__.DIRECTORY_SEPARATOR.'404.php';
@$url = strtolower(htmlentities($_GET['url']))  ;
(!$url)?($url='home'):('');

//--- session
if (session_status()!=2) {
	session_start();
	session_regenerate_id(true);
} 
if ( @$_SESSION != null  && empty(@$_COOKIE['ooioo']) && empty(@$_COOKIE['oiiooiiioo'] )  ) { 
    setcookie("ooioo", $_SESSION['id'] ,time()+(3600*24*365),null,null,false,true) ;
    setcookie("oiiooiiioo", $_SESSION['password'] ,time()+(3600*24*365),null,null,false,true) ;
} 
if ( empty(@$_SESSION)  && !empty(@$_COOKIE['ooioo']) && !empty(@$_COOKIE['oiiooiiioo'] ) ) {  
	require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'Login.php');
	$Login = new Login( $_COOKIE['ooioo']  ,  $_COOKIE['oiiooiiioo'] );
     $Youlogin = $Login->Youlogin();
	if ($Youlogin) {
	$_SESSION = $Login->Info() ;
	}else
	{
		header('location:logout');
	}
} 


//------ server----

if ( stripos($url , 'erver') ) {
	$server = explode($url,'/') ;
include( ROOTPATH.'server'.DIRECTORY_SEPARATOR.$server['1'] .DIRECTORY_SEPARATOR.'index.php');
die() ;
}

//--rooter
require(ROOTPATH.'Class'.DIRECTORY_SEPARATOR.'Rooter.php');
$infoRooter = new Rooter();
$infoRooter = $infoRooter->Info_Page($url);

 $page_title = $infoRooter['page_title'];

///-----------  IP
require( ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'ip'.DIRECTORY_SEPARATOR.'ip.php') ;


//--- Data Base 
require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
 $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;

require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'header.php');
require( $infoRooter['mypage']);
require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'footer.php');

