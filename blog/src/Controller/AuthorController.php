<?php



namespace Controller;


class AuthorController extends Controller{

	public function afficheAll(){
		
		// 1 : Recuperer les infos en BDD

		$authors = $this -> getModel() -> getAllAuthors();

		$params = array(
			'authors' => $authors
			);
		return $this -> render('layout.html','articles_view.php',$params);
		// 2 : Afficher la vue

		// require __DIR__.'/../View/articles_view.php';

	}

	public function affiche($id){
		$params = array(
			'authors' => $authors,

			
			);
		// 1 : Recuperer les infos en BDD

		$authors = $this -> getModel() -> getAuthorById($id);

		// 2 : Afficher la vue

		// require __DIR__.'/../View/view_articles.php';
	}
 

	public function create(){


	}

	public function modifier($id){


	}

	public function supprimer($id){


	}












}