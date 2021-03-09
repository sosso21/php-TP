<?php
/* 
    register

*/
    /**
     * 
     */


    class Register
    {
    	private $_error ;
        private $_user;
        private $_isbeenregister ;
    	
    	public function __construct($user = null , $pass1 = null , $pass2= null  , $condition= null  )
    	{
    		$this->_error = '';
    		if (strlen($user)<4) {
    			$this->_error  .= <<<HTML
    			 <div class='alert alert-danger'> <p> Ce nom d'utilisateur est trop court </p> </div>
HTML;

                 return '' ;

    		}
    		if ($pass1 !== $pass2 ) {
    			$this->_error .= <<<HTML
    			 <div class='alert alert-danger'> <p> Mot de passe Incompatible </p> </div>
HTML;

                 return '' ;

    		}elseif (strlen($pass1) < 8 ) {
    			$this->_error =  <<<HTML
    			 <div class='alert alert-danger'> <p> Mot de passe  trop court </p> </div>
HTML;

                 return '' ;

    		}if ($condition !== 'on') {
    			$this->_error .= <<<HTML
    			 <div class='alert alert-danger'> <p> Veuillez lire et accepter les Termes du site </p> </div>
HTML;

                 return '' ;

    		}
    		if ($this->issub()  ) {
    			$this->_error .=  <<<HTML
    			 		<div class='alert alert-danger'><p> Ce nom d'utilisateur est déja Utilisé </p> </div>
HTML;

                 return '' ;

    		}


    		if (isset($user, $pass1 ,$pass2 , $condition) ) {

    			require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');


    			$pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
    			 $request = $pdo->prepare("INSERT INTO user  (`username`, `password`) VALUES (?, SHA2(?, 256))" );
    			  $request->execute(array($user , $pass1));
                  $this->_isbeenregister = true  ;
                  $this->_user = $user  ;
    		}
    	}
    	public 	function issub()
    	{
    		require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
    		$pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
    		$request2 = $pdo->prepare("SELECT COUNT(*) FROM user WHERE username =?  ");
    			 $request2->execute(array($this->_user));
    			 $count =  $request2->fetch(PDO::FETCH_ASSOC);
    			 return $count['COUNT(*)']	;

    	}
        public function isbeenregister()
        {
            if ($this->_isbeenregister ){
                        return $this->_isbeenregister ;
            }elseif (empty($this->_isbeenregister)) {
                return false ;
            }
        }
        public function Infouser()
        {
            require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
            $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
            $request3 = $pdo->prepare(" SELECT id , is_admin  from user  WHERE username =?  ");
                 $request3->execute(array($this->_user));
                 $info =  $request3->fetch(PDO::FETCH_ASSOC);
                 return $info  ;
        }
    	public function ToHTML()
    	{
    		if (!empty($this->_error)) {
    			return $this->_error ;

    		}
    	}
}







