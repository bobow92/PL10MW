<?php


namespace Entity;

class Article{

	private $id_article;
	private $title_article;
	private $content;
	private $id_author;
	private $date_publication;
	private $category;
	private $img_article;

	// id_article
	public function setId_article($arg){
		$this -> id_article = $arg;
	}
	public function getId_article(){
		return $this -> id_article;
	}


	// title_article
	public function setTitle_article($arg){
		$this -> title_article = $arg;
	}
	public function getTitle_article(){
		return $this -> title_article;
	}


	// content
	public function setContent($arg){
		$this -> content = $arg;
	}
	public function getContent(){
		return $this -> content;
	}



	// id_author
	public function setId_author($arg){
		$this -> id_author = $arg;
	}
	public function getId_author(){
		return $this -> id_author;
	}



	// Date_publication
	public function setDate_publication($arg){
		$this -> date_publication = $arg;
	}
	public function getDate_publication(){
		return $this -> date_publication;
	}



	// category
	public function setCategory($arg){
		$this -> category = $arg;
	}
	public function getCategory(){
		return $this -> category;
	}


	public function setImg_article($arg){
		$this -> img_article = $arg;
	}
	public function getImg_article(){
		return $this -> img_article;
	}





}