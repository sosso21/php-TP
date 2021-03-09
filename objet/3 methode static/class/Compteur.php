<?php
/*
  public : aucune restriction
  private : disponible que dans la class
  protected :  disponible meme dans les class enfant
*/

class Compteur
{
	private  $_vues ;
	private $_fichier ; 
	 public function __construct($fichier)
	{
		$this->_fichier = $fichier;
	}


	public   function increment()
	{ 
		if (file_exists($this->_fichier)) 
			$this->_vues = file_get_contents($this->_fichier);
		else
			$this->_vues = 0 ;
		$this->_vues++;
		file_put_contents($this->_fichier ,$this->_vues );
	}
	public   function recuperer()
	{
		// return $this->_vues ;
		return file_get_contents($this->_fichier);
	}
	
}
?>
