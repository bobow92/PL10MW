<?php

namespace Model;
use PDO;

class ArticleModel extends Model{



	public function getAllArticles(){
		return $this -> findAll();

	}


	public function getArticleById($id){
		$produit = $this -> getModel() -> getArticleById($id);
        $prod = $this -> getModel() -> getCategoryById($id);
		$params = array(
			
            'articles' => $articles,
            'category' => $category,
        
        );

		return $this -> render('layout.html', 'view_articles.html', $params);
	
	
	
	}

	public function DeleteArticleById($id){
		return $this -> delete($idv);
	}

	public function UpdateArticleById($id){
		return $this -> update($id);
	}

	public function RegisterArticle(){
		return $this -> register();
		$resultat = "INSERT INTO author (name, firstname, email, birth_date) VALUES (:name,:firstname,:email,:birth_date )";
		$resultat = $pdo -> prepare($sql);
		$resultat -> bindValue(':name', $_POST['name'], PDO::PARAM_STR);
		$resultat -> bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
		$resultat -> bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$resultat -> bindValue(':birth_date', $date, PDO::PARAM_STR);

	}

	public function GetArticleByCategory($cat){
		$requete = "SELECT * FROM article. ON article.id_cat WHERE category.id_category = :id_category";
		$resultat->bindValue(':id_category',$id_cat,PDO::PARAM_STR);
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

	public function GetArticleByAuthor($auth){
		$requete = "SELECT * FROM article. ON article.id_author WHERE author.id_author = :id_author";
		$resultat->bindValue(':id_author',PDO::PARAM_STR);
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