<?php
//app/Config.php

class Config
{
    protected $parameters; // Va contenir tous les parametres de notre App
    
    public function __construct(){
        require __DIR__ . '/Config/parameters.php';
        $this -> parameters = $parameters;
        // Au moment de l'instanciation de Config, on récuperer le fichier de parametre 
        // et on stock tous les parametres dans $ parametres
    
    }
    
    public function getParametersConnect(){
        return $this -> parameters['connect'];
    	// Cette fonction a vocation à servir/apporter" les paramètres de connexion à la BDD
    }


    public function getParametersSite(){

        return $this -> parameters['site'];
    }
}


// $config = new Config;
// echo "<pre>";
// print_r($config -> getParametersConnect());
// echo "</pre>";

