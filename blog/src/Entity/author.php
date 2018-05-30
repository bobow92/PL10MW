<?php

namespace Entity;

class Author{

	private $id_author;
	private $name;
	private $firstname;
	private $email;
	private $birth_date;
	private $password;

	// id_article
	public function setId_author($arg){
		$this -> id_author = $arg;
	}
	public function getId_author(){
		return $this -> id_author;
	}


	// title_article
	public function setFirstname$arg){
		$this -> firstname = $arg;
	}
	public function setFirstname()){
		return $this -> firstname;
	}

	// title_article
	public function setName($arg){
		$this -> name = $arg;
	}
	public function setName(){
		return $this -> name;
	}


	// content
	public function setEmail($arg){
		$this -> email = $arg;
	}
	public function setEmail(){
		return $this -> email;
	}



	// id_author
	public function setBirth_date($arg){
		$this -> birth_date = $arg;
	}
	public function getBirth_date(){
		return $this -> birth_date;
	}



	// Date_publication
	public function setPassword($arg){
		$this -> password = $arg;
	}
	public function getPassword(){
		return $this -> password;
	}