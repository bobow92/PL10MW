<?php

namespace Entity;

class Newsletter{

	private $email_new;
	 


	// id_article
	public function setEmail_new($arg){
		$this -> email_new = $arg;
	}
	public function getEmail_new(){
		return $this -> email_new;
	}
}