<?php

namespace Model;
use PDO;

class ArticleModel extends Model{



	public function getAllArticles(){
		return $this -> findAll();

	}



	public function DeleteArticleById($id){
		return $this -> delete($idv);
	}

	public function UpdateArticleById($id){
		return $this -> update($id);
	}



	 

	public function GetArticleByAuthor($auth){
		$requete = "SELECT name FROM author. ON author.id_author WHERE article.id_author = :id_author";
		$resultat->bindValue(':id_author',$id_author,PDO::PARAM_STR);
		$resultat->execute();
		$resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\Article');
		$donnees = $resultat->fetchall();

		if (!$donnees) {
			return false;
		}

		else {
			return $donnees;
		}
	}
}