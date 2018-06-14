<?php



namespace Controller;


class CategoryController extends Controller{

	public function afficheAll(){
		
		// 1 : Recuperer les infos en BDD

		$categorys = $this -> getModel() -> getAllCategorys();

		$params = array(
			'categories' => $categories
			
			);
		return $this -> render('layout.html','articles_view.php',$params);
		// 2 : Afficher la vue

		// require __DIR__.'/../View/articles_view.php';

	}

	public function affiche($id){
		$params = array(
			'articles' => $articles,
			'categories' => $categories,
		 
			
			);
		// 1 : Recuperer les infos en BDD

		$articles = $this -> getModel() -> getArticleById($id);

		// 2 : Afficher la vue

		// require __DIR__.'/../View/view_articles.php'; 	
	}


	public function afficheByCategory($category){

		$articles = $this -> getModel() -> getArticleByCategory($category);


		// require __DIR__.'/../View/view_articles_category.php'
	}



	public function create(){


	}

	public function modifier($id){


	}

	public function supprimer($id){


	}












}