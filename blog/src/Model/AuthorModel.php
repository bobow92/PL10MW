
<?php

namespace Model;
use PDO;

class ArticleModel extends Model{



	public function getAllAuthors(){
		return $this -> findAll();
		$requete = "SELECT * FROM author";
		$resultat->bindValue(':id_author',$id_author, PDO::PARAM_STR);
		$resultat->execute();
		$resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\Author');
		$donnees = $resultat->fetchall();
	}


	public function getAuthorById($id){
		return $this -> find($id);
	}

	public function DeleteAuthorById($id){
		return $this -> delete($idv);
	}

	public function UpdateAuthorById($id){
		return $this -> update($id);
	}

	public function RegisterAuthor(){
		return $this -> register();
		$resultat = "INSERT INTO author (name, firstname, email, birth_date) VALUES (:name,:firstname,:email,:birth_date )";

		$resultat = $pdo -> prepare($sql);
		$resultat -> bindValue(':name', $_POST['name'], PDO::PARAM_STR);
		$resultat -> bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
		$resultat -> bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$resultat -> bindValue(':birth_date', $date, PDO::PARAM_STR);

	}

 
}