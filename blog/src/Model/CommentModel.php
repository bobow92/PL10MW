<?php

namespace Model;
use PDO;

class CommentModel extends Model{


 
	}


	public function getCommentById($id){
		$produit = $this -> getModel() -> getCommentById($id);
        $prod = $this -> getModel() -> getAuthorById($id);
		$params = array(
			
            'comments' => $comments,
            'authors' => $authors,
        
        );

		return $this -> render('layout.html', 'view_articles.html', $params);
	
	
	
	}
 

	public function UpdateCommentsById($id){
		return $this -> update($id);
	}

	public function RegisterComments(){
		return $this -> register();
 

 

	public function GetCommentsByAuthor($auth){
		 
	}
}