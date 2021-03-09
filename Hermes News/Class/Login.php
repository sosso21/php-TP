<?php
/* 
    Login class

*/
    /**
     * 
     */


    class Login
    {
    	private $_error ;
        private $_user;
        private $_pass ;
    	
    	public function __construct($user = null , $pass = null)
        {
    		
            $this->_user = $user ;
            $this->_pass = $pass ;
        }
            public function Youlogin()
        {

    		if (isset( $this->_user,$this->_pass) && $this->issub() ) {
                return true ;
    		}
            else{
                $this->_error .= <<<HTML
                <div class='alert alert-danger'><p> User / Mot de passe incorrent </p> </div>

HTML;

            }
    	}
    	public 	function issub()
    	{
    		require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
    		$pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
    		$request2 = $pdo->prepare("SELECT COUNT(*) FROM user WHERE username =?  and (password = SHA2(?, 256) ) ");
    			 $request2->execute(array($this->_user , $this->_pass ));
    			 $count =  $request2->fetch(PDO::FETCH_ASSOC);
    			 return $count['COUNT(*)']	;
    	}
        public function Info()
        {
                 require(ROOTPATH.'elements'.DIRECTORY_SEPARATOR.'db_config.php');
            $pdo  = new PDO($db_DSN , $db_USER , $db_PASS ) ;
            $request3 = $pdo->prepare(" SELECT id , is_admin  from user  WHERE username =? And password =  SHA2(?, 256) ");
                 $request3->execute(array($this->_user , $this->_pass));
                 $info =  $request3->fetch(PDO::FETCH_ASSOC);
                 return $info  ;
            
        }
    	public function ToHTML()
    	{
            
    		if (isset($this->_error)) {
    			return $this->_error ;

    		}
    	}
}







