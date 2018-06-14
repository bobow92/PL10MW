
<?php

namespace Model;
use PDO;

class NewsletterModel extends Model{



	public function getAllNewsletter(){
		return $this -> findAll();
		$requete = "SELECT * FROM newsletter";
		$resultat->bindValue(':email_new',$email_new, PDO::PARAM_STR);
		$resultat->execute();
		$resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\Author');
		$donnees = $resultat->fetchall();
	}


 
}