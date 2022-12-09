/*
----------------------------------------------------------------------------------------------------------------
-- FICHIER SQL POUR MAROUA SHOP T-O 
Rédiger par Sofiane Gherab
Tel : +213 559 205 748
----------------------------------------------------------------------------------------------------------------
-- Re-création de la base de données ----------------------------------------------------------------------------Brouillon :
   **- possiblitée de se connecter
   **- possiblité de publier un article 
   **- possiblité de publier une catégorie
   **- Possibliée de Démarrée une commende 



----------------------------------------------------------------------------------------------------------------
*/

DROP DATABASE IF EXISTS `m_s`;
CREATE DATABASE IF NOT EXISTS `m_s`;

USE `m_s`;

/*
----------------------------------------------------------------------------------------------------------------
-- Création des tables -----------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------
*/

/*
--- Newsletters historuqque
*/

CREATE TABLE IF NOT EXISTS newsletter
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`email_info` VARCHAR(1024) NOT NULL,
	UNIQUE ( `id`) 
);

CREATE TABLE IF NOT EXISTS user
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`nom` VARCHAR(255) NOT NULL, 
	`prenom` VARCHAR(255) NOT NULL, 
	`adress` VARCHAR(255) , 
	`email` VARCHAR(25) NOT NULL, 
	`tel` varchar(13) , 
	`is_admin` BOOLEAN DEFAULT false,
	`is_affiliat` smallint  DEFAULT -2,
	`sub_date`  INT NOT NULL DEFAULT (UNIX_TIMESTAMP()) , 
	`password` VARCHAR(255) NOT NULL,
	UNIQUE ( `email`) ,
	UNIQUE ( `id`) ,
	PRIMARY KEY(`id`)
);

/*
# ----------------- post -----------
*/

CREATE TABLE IF NOT EXISTS post
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`slug` VARCHAR(255) NOT NULL,
	`name` VARCHAR(255) NOT NULL, 
	`description` VARCHAR(512) ,
	`prix` smallint ,
	`monnais` varchar(15),
	`disponible` BOOLEAN DEFAULT 1 ,
	`p_date`  INT NOT NULL DEFAULT (UNIX_TIMESTAMP()) , 
	UNIQUE ( `slug`) ,
	PRIMARY KEY(`id`)
);

/*
## si on veut le temp en YYYY-MM-DD HH-ii-SS 
# `c_date` DTETIME  NOT NULL DEFAULT now() , 
*/

/*
##----- categories ---------
*/

CREATE TABLE IF NOT EXISTS categorie
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	`slug` VARCHAR(255) NOT NULL, 
	UNIQUE ( `slug`) ,
	PRIMARY KEY(`id`)
);

/*
##--- Images
*/

CREATE TABLE IF NOT EXISTS image
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	`for_post` INT NOT NULL,
	
		CONSTRAINT `fk_img`
	 FOREIGN KEY (`for_post`)
	  REFERENCES `post` (`id`)
	  ON DELETE CASCADE
	  ON UPDATE RESTRICT , 

	PRIMARY KEY(`id`)
);

/*
## -- commandes de clients
*/

CREATE TABLE IF NOT EXISTS comende
(
	`id` INT NOT NULL AUTO_INCREMENT, 
	`statut` smallint  DEFAULT -2,
	`client` INT  NOT NULL ,
	`type` VARCHAR(255) NOT NULL, 
	`description` VARCHAR(512) ,
	`c_date`  INT NOT NULL DEFAULT (UNIX_TIMESTAMP()) , 
	
	
		CONSTRAINT `fk_cmd`
	 FOREIGN KEY (`client`)
	  REFERENCES `user` (`id`)
	  ON DELETE CASCADE
	  ON UPDATE RESTRICT , 

	PRIMARY KEY(`id`)
);

/*
## --------------- liaisons ------------
*/

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

/*
---- singup
*/
      






















/*
## ---- ajouter des categorie -----------

`name`,`slug` , `img`
*/


INSERT INTO categorie (`name` , `slug`  )
VALUES

(' electromenage', 'elect ' ),
(' Tch', 'Tech '  ),
(' aliment', 'aliment '   ),
(' loisir', 'loisir '  ),
(' cosmetique', 'cosmetique ' )

; 
  

/*
## ---article 

`name`,`slug`,`description`,`prix`, `monnais`, `p_date`

*/
INSERT INTO post  (`name`, `slug`,`description`,`prix`, `monnais` )
VALUES
('frigo 2 ', 'frigo1',' frigo de marque SamSALE ' , '24.5' , 'point'  ),
('spaghetti 2 ', 'spaghetti2',' spaghetti de marque MrSale ' , '45' , 'DZD'  ),
('frigo 1 ', 'frigo2',' frigo de marque SamSALE ' , '10.5' , 'point'  ),
('spaghetti 1 ', 'spaghetti1',' spaghetti de marque MrSale ' , '35' , 'DZD'  ),
('frigo 2 ', 'frigo3',' frigo de marque SamSALE ' , '10.5' , 'point'  ),
('spaghetti 1 ', 'spaghetti3',' spaghetti de marque MrSale ' , '35' , 'DZD'  ),
('voyage 1 ', 'voyage1',' voyage à Timimoun ' , '1005' , 'point'  )

; 


/*
## --- associer 

*/

INSERT INTO categorie_post  (`id_post`, `id_categorie`  )
VALUES
('1','1'),
('1','2'),
('3','3'),
('2','1'),
('2','3')
; 


/*
--- join-------
*/

/* afiicher les  categorie de post 1 */
 select * from categorie_post
   left join categorie ON categorie_post.id_categorie = categorie.id
 where categorie_post.id_post = 1 ;
 

/*--- a partir de categorie 1  */ 

  select * from categorie_post    left join  post ON categorie_post.id_post = post.id  where categorie_post.id_categorie = 1 ;

/*
--- user-------
 `nom`, `prenom`, `adress`, `email`, `tel`, `password`, `is_admin`, `is_affiliat` ,

*/

INSERT INTO user  ( `nom`, `prenom`, `adress`, `email`, `tel`, `password`, `is_admin`, `is_affiliat`  )
VALUES

('sofiane', 'gherab' ,'' , 'sofianetop21.st@gmail.com' , '' , SHA2('sofiane321', 256),0 ,-2 ),
('admin', 'admin' ,'chez moi ' , 'admin@ms.com' , '+213559205748' , SHA2('admin', 256),1 ,1 ),
('user', 'user' ,'chez moi ' , 'user@ms.com' , '+21312345678' , SHA2('user', 256),0 ,1 ),
('client', 'client' ,'chez moi ' , 'client@ms.com' , '+54454554' , SHA2('client', 256),0 ,0 );



/*
--- commande -------
client`, type`, `description`

*/

INSERT INTO comende  (`client`,  `type`, `description` , `statut` )
VALUES

( ' 3' , 'frigo1' , 'marque machin ' , -2  ),
( ' 3' , 'voyage' , 'vers djborland ' , 0  ),
( ' 3' , 'spaghett' , 'marque bidule ' , 1  ),
( '3' , 'slut' , 'bojouur blabla',1  )     
;




/*
--- image-------
`name` , `for_post`
*/

INSERT INTO image  (`name` , `for_post` )
VALUES


('View/image/post/image3.jpeg',1),
('View/image/post/image4.jpeg',2),
('View/image/post/image10.jpeg',3),
('View/image/post/image9.jpeg',4),
('View/image/post/image7.jpeg',5),
('View/image/post/image8.jpeg',6),
('View/image/post/image6.jpeg',7),
('View/image/post/image5.jpeg',1),
('View/image/post/image3.jpeg',2)
; 





















/*
-- SHOW TABLE STATUS ;
*/
show tables ;

