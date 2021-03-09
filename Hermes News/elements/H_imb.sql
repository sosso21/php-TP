/*
----------------------------------------------------------------------------------------------------------------
-- FICHIER SQL POUR LA SÉANCE #11 (youtube.com/formationvideo8)
-- Jason CHAMPAGNE
----------------------------------------------------------------------------------------------------------------
-- Re-création de la base de données ----------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------
*/

DROP DATABASE IF EXISTS `h_news`;
CREATE DATABASE IF NOT EXISTS `h_news`;
USE `h_news`;

/*
----------------------------------------------------------------------------------------------------------------
-- Création des tables -----------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------
*/

CREATE TABLE IF NOT EXISTS user
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`username` VARCHAR(255) NOT NULL, 
	`password` VARCHAR(255) NOT NULL,
	`is_admin` BOOLEAN DEFAULT false,
	UNIQUE ( `username`) ,
	PRIMARY KEY(`id`)
);
----------------- post -----------

CREATE TABLE IF NOT EXISTS post
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	`slug` VARCHAR(255) NOT NULL,
	`content` VARCHAR(65235) NOT NULL,
	`c_date` INT  NOT NULL DEFAULT UNIX_TIMESTAMP() , 
	UNIQUE ( `slug`) ,
	PRIMARY KEY(`id`)
);
--## si on veut le temp en YYYY-MM-DD HH-ii-SS 
-- `c_date` DTETIME  NOT NULL DEFAULT now() , 

----- categories ---------

CREATE TABLE IF NOT EXISTS categorie
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	`slug` VARCHAR(255) NOT NULL,
	UNIQUE ( `slug`) ,
	PRIMARY KEY(`id`)
);

--------------- liaisons ------------

CREATE TABLE IF NOT EXISTS categorie_post
(
	`id_post` INT NOT NULL , 
	`id_categorie` INT NOT NULL ,
	PRIMARY KEY(`id_post` ,`id_categorie` ),
	CONSTRAINT `fk_post`
	 FOREIGN KEY (`id_post`)
	  REFERENCES `post` (`id`)
	  ON DELETE CASCADE
	  ON UPDATE RESTRICT , 

	CONSTRAINT fk_categorie
	 FOREIGN KEY (`id_categorie`)
	  REFERENCES `categorie` (`id`)
	  ON DELETE CASCADE
	  ON UPDATE RESTRICT 
);

---- ajouter des categorie -----------

INSERT INTO categorie (`name`, `slug` )
VALUES

('News Tch', 'Tech'); 



---article 
INSERT INTO post  (`name`, `slug` ,`content` )
VALUES
('article 1 ', 'Article1','hello '); 

--- associer 
INSERT INTO categorie_post  (`id_post`, `id_categorie`  )
VALUES
('1 ', '1'); 

--- join-------
 select * from categorie_post
   left join categorie ON categorie_post.id_categorie = categorie.id
 where categorie_post.id_post = 1 ;
----
 select * from categorie_post
   left join post ON 
   categorie_post.id_post = post.id
 where categorie_post.id_categorie = 6 ;



--- user-------


INSERT INTO user  (`username`, `password`,`is_admin`  )
VALUES
('admin', SHA2('admin', 256),1 ),
('eliot', SHA2('bo,jour', 256),0 )
; 





-- SHOW TABLE STATUS ;



/*



require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
 $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
  


for ($i=0; $i<=  50 ; $i++) { 

	
$request = $pdo->prepare("INSERT INTO post  (`name`, `slug` ,`content` )
VALUES
('article $i  ', 'Article-$i ',' jfhfhsfoh f fshfhfshfhs hhgfhg fggfhgfshgghfghs fsgffyfgyf fyggfsy gfsyfgyfgyfgy fsyfgyfgyfygfsyf fgyfsgfsfsgfsgyfsgyfsgyfsgyfsygfsfsgfgyygfgf ycxrsvqhycgqgyqgygdqdsfffqsviq i fq fqdst fqqfIFSD CTQGFVGCFDTFDGCVX ')  ");
 $request->execute();
                
}

$request2 = $pdo->prepare("SELECT * FROM post ");
$request2->execute();

$result= $request2->fetchall();


?>

<h1>Ajouter des articles</h1>

<pre>

	<?= print_r($result ); ?>
</pre>
                

*/
---------categorie ---------

/*


<?php



require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
 $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
  


for ($i=1; $i<=  5 ; $i++) { 

	
$request = $pdo->prepare("INSERT INTO categorie  (`name`, `slug`  )
VALUES
('categorie $i  ', 'categorie-$i')  ");
 $request->execute();
                
}

$request2 = $pdo->prepare("SELECT * FROM categorie ");
$request2->execute();

$result= $request2->fetchall();


?>

<h1>Ajouter des categorie</h1>

<pre>

	<?= print_r($result ); ?>
</pre>
                

*/


------------ categorie_post
/*
require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
 $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
  



for ($i=1; $i < 52 ; $i+=21) { 
	# code...

$request = $pdo->prepare("INSERT INTO categorie_post  (`id_post`, `id_categorie`  )
VALUES
(' $i ', '6')  ") ;
 $request->execute();
                
}


$request2 = $pdo->prepare(" SELECT * from categorie_post
   left join categorie ON categorie_post.id_categorie = categorie.id
 where categorie_post.id_post = 4 ");
$request2->execute();

$result= $request2->fetchall();


?>

<h1>Ajouter des categorie</h1>

<pre>

	<?= print_r($result ); ?>
</pre>
                
*/

