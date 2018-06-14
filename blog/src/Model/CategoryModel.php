<?php

namespace Model;
use PDO;

class CategoryModel extends Model{



	public function getAllCategories(){
		return $this -> findAll();

	}


	public function getArticleById_cat($id){
		$produit = $this -> getModel() -> getArticleById($id);
        $prod = $this -> getModel() -> getCategoryById($id);
		$params = array(
			
            'articles' => $articles,
            'categories' => $categories,
        
        );

		return $this -> render('layout.html', 'view_articles.html', $params);
	
	
	
	}
 }