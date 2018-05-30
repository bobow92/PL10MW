	<?php

namespace Entity;

class Author{

	private $id_category;
	private $title;
	private $is_active;
	

	// id_category
	public function setId_category($arg){
		$this -> id_category = $arg;
	}
	public function setId_category(){
		return $this -> id_category;
	}


	// title
	public function setTitle($arg){
		$this -> title = $arg;
	}
	public function setTitle(){
		return $this -> title;
	}


	// is_active
	public function setIs_active($arg){
		$this -> is_active = $arg;
	}
	public function setIs_active(){
		return $this -> is_active;
	}


