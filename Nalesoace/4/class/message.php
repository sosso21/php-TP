<?php

/**
 *  Message.php
 */
class Message
{
	const USER_LIMIT = 3 ;
		const MESSAGE_LIMIT = 500 ;

	private $_message;
	private $_user ;
	private $_date;

	function __construct($user , $message , $date = null )
	{
		$this->_user = $user ;
		$this->_message = $message ;
		$this->_date = $date ?: new DateTime() ;
	}
	public function geterror()
	{
		$error = [] ;
		if (strlen($this->_user)  <= self::USER_LIMIT ) {
			$error ['username'] = " username trop court min : ". self::USER_LIMIT .' caractères'   ;
		}
		if ( strlen($this->_message) >= self::MESSAGE_LIMIT  ) {
			$error['message'] = " message trop long max : ". self::MESSAGE_LIMIT .' caractères'   ;
		}
		return $error ;
	}

	public function isvalid()
	{
		return  empty($this->geterror() );
	}
	public function toHTML()
	{
		return <<<HTML
		<p><strong> {$this->_user} </strong> <em> le  {$this->_date->format('d-m-Y à H:i')} </em><br> {$this->_message} </p> 
HTML;

	} 


	public function	totbl() 
	{
		return json_encode(
			[
			'username' =>$this->_user,
			'message' => $this->_message ,
			'date' =>  $this->_date->getTimestamp() ,
		]);
	}

}

/*<p>
		<strong> $this->_user </strong> <em> le  $this->_date->format('d-m-Y à H-i') </em><br>
		$this->_message 
		</p> 
		*/ 