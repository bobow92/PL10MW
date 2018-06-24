<?php

//vendor/Controller/Controller.php

namespace Controller;

use Model, Config;

class Controller
{
    protected $model; // Contiendra le nom du model à instancier (ProduitModel si je suis dans ProduitController, MembreModel si je suis dans MembreController) 
    protected $url; // Contiendra le chemin du site
    
    public function __construct(){
        $class = 'Model\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Model';
                
     //Exemple : Si je suis dans Controller\ProduitController
     //Je retire 'Controller\' et 'Controller', il reste 'Produit'
     //J'ajoute 'Model\' au début et 'Model' à la fin... 
     // Il reste donc :
     //$class = Model\ProduitModel
     
        $this -> model = new $class;
     // $this -> model = new Model\ProduitModel 
     // J'instancie donc Model\ProduitModel et je stocke l'objet ProduitModel dans $this -> model;
     
     
        $config = new Config;
        $site = $config -> getParametersSite();
        $this -> url = $site['url'];
     
    }
    
    public function getModel(){
         return $this -> model; 
    }

    
    public function render($layout, $view, $params){
        

        $dirView = __DIR__ . '/../../src/View/';
        $dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . '/';
        // Controller\ProduitController ==> Produit
        
        $path_view = $dirView . strtolower($dirFile) . $view;
        //../View/produit/boutique.html

        $path_layout = $dirView . $layout;
        //../View/layout.html
        
        $params['url'] = $this -> url; 
        //On embarque avec nous dans toutes les pages, la variable $url qui contient l'url du site, paramétrée dans app/Config/parameters.php
        
        extract($params);
        // Grâce à ce extract, les noms des indices dans mon array params, correspondront aux noms des variables utilisées dans mes vues.
        
        //-----------------
        ob_start(); // Enclenche la temporisation de sortie. C'est à dire que ce qui va suivre ne sera pas exécuter tout de suite, mais temporisé (retenu en memoire tampon).   

        require $path_view;
        $content = ob_get_clean(); // Je stocke ce qui a été retenu dans la variable $content;
        
        ob_start();

        require $path_layout;
        
        return ob_end_flush(); // Retourne tout ce qui a été retenu et eteint la temporisation. 
    }
}

