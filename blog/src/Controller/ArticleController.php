<?php



namespace Controller;


class  ArticleController extends Controller{

	public function afficheAll(){	
		// 1 : Recuperer les infos en BDD
		$articles = $this -> getModel() -> getAllArticles();
		$params = array(
			'articles' => $articles
			);
		return $this -> render('layout.html','base/articles_view.html',$params);
		// 2 : Afficher la vue
		// require __DIR__.'/../View/base/articles_view.html';
	}

	public function affiche($id){
		$articles = $this -> getModel() -> getArticleById($id);
		$params = array(	
            'articles' => $articles,
        );
		return $this -> render('layout.html', '/../base/view_articles.html', $params);

		// require __DIR__.'/../View/base/view_articles.html';
	
	
	}
	public function ArticleByAuthor(){
		$articles = $this -> getModel() -> GetArticleByAuthor();
		$params = array(
			'articles' => $articles
		);
		return $this -> render('layout.html','articles_view.html',$params);
	}



 

	public function getNameById_author($id){

		$requete = "SELECT name from author LEFT JOIN article on article.id_author WHERE author.id_author = id_article";
		$resultat = $this -> getDB() -> prepare($requete);
		$resultat -> bindValue(':id_author', $id, PDO::PARAM_STR);
		$resultat -> execute();

		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity/Article');
		$donnees = $resultat -> fetchAll();

		if (!$donnees) {
			return false;
		}
		else
		{
			return $donnees;
		}
	}

 



	public function create(){

		 
		$resultat = "INSERT INTO article (title_article, content, category, img_article) VALUES (:title_article, :content, :category, :img_article)";
		$resultat = $pdo -> prepare($sql);
		$resultat -> bindValue(':title_article', $_POST['title_article'], PDO::PARAM_STR);
		$resultat -> bindValue(':content', $_POST['content'], PDO::PARAM_STR);
		$resultat -> bindValue(':category', $_POST['category'], PDO::PARAM_STR);
		$resultat -> bindValue(':img_article', $_FILE['img_article'], PDO::PARAM_STR);

	 
	}

	public function modifier($id){


	}

	public function supprimer($id){


	}












}