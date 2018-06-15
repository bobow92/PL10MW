<?php
//app/Config.php

class Config
{
//    print_debug_backtrace();
	protected $parameters; // contient les infos du fichiers parameters.php
	
	public function __construct(){
		require __DIR__ . '/Config/parameters.php';
		$this -> parameters = $parameters;
		// Au moment où j'instancie cette classe, je récupère le fichier parameters.php, et je stocke tous les paramètres de mon application dans la propriété $parameters.
	}
	
	public function getParametersConnect(){
		return $this -> parameters['connect'];
		// Cette fonction retourne seulement les informations de connexion qui me seront utiles au moment de la connexion à la BDD. 
	}
	
	public function getParametersSite(){
		return $this -> parameters['site'];
		// Cette fonction retourne seulement les informations relatives au site (url, racine, chemin) qui me seront utiles dans mes vues.
	}
}