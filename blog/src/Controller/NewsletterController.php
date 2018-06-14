<?php



namespace Controller;


class  NewsletterController extends Controller{

	public function sendNews(){	
		// 1 : Recuperer les infos en BDD
		$articles = $this -> getModel() -> getAllArticles();
		
		// 2 : Afficher la vue
		// require __DIR__.'/../View/base/articles_view.html';
	}

 






}