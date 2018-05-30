<?php

namespace Entity;

class Author{

	private $id_comment;
	private $pseudo;
	private $content;
	private $id_article;


	// id_article
	public function setId_comment($arg){
		$this -> id_comment = $arg;
	}
	public function getId_comment(){
		return $this -> id_comment;
	}


	// title_article
	public function setPseudo($arg){
		$this -> pseudo = $arg;
	}
	public function setPseudo(){
		return $this -> pseudo;
	}


	// content
	public function setContent($arg){
		$this -> content = $arg;
	}
	public function setContent(){
		return $this -> content;
	}



	// id_author
	public function setId_article($arg){
		$this -> id_article = $arg;
	}
	public function setId_article(){
		return $this -> id_article;
	}

