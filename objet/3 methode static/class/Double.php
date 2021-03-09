<?php
/*
   l'heritage : 
     * pour qu'une class herite d'une autre il faut juste metrre 'extends'

     *pour invoquer une methode parent il faut faire parent::methode()
*/

class Double extends Compteur
{
	public function recupdouble()
	{
		return  2* parent::recuperer();
	}
	
	
}

?>
