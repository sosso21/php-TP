<?php 
/*Guestbook.php



 */
require_once('message.php') ;
class Guestbook 
{
	private $_file ;
	function __construct($file)
	{
		$this->_file = $file ;
		$directory = dirname($this->_file);
		if (!is_dir($directory)) {
			mkdir($directory,777,true);
		}

	}
	public function	addmessage($message)
	{
		file_put_contents($this->_file,  $message->totbl()  .PHP_EOL  ,FILE_APPEND);

	}
	public function getmessage()
	{
		$content = trim(file_get_contents($this->_file));
		$lines = explode(PHP_EOL , $content);
		$commentaires = [];

		foreach ($lines as  $line) {
			$data = json_decode($line ,true );
			$datetime = new DateTime( '@'.$data['date'])  ;
			// on doit changer le fuseau 
			$commentaires[]  = new message($data['username'] ,$data['message'], $datetime );
		}
		return array_reverse($commentaires );


	}

}