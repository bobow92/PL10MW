<?php

namespace Manager;

final class Application
{
   protected $controller;
   protected $action;
   protected $argument;
   
   public function __construct(){
       
       $tab = explode('/', $_SERVER['REQUEST_URI']);
       
       if(isset($tab[5]) && !empty($tab[5]) && file_exists(__DIR__ . '/../../src/Controller/'. ucfirst($tab[5]) . 'Controller.php'))
       {
           $this -> controller = 'Controller\\' . ucfirst($tab[5]) . 'Controller';
       }
       else{
           $this -> controller = 'Controller\ArticleController';
       }
       
       
       if(isset($tab[6]) && !empty($tab[6])){
           $this -> action = $tab[6];
       }
       else{
           $this -> controller = 'Controller\ArticleController';
           $this -> action = 'afficheAll';
       }
       
       
       if(isset($tab[7]) && !empty($tab[7])){
           $this -> argument = $tab[7];
       }
   }
   
   public function run(){
       if(!is_null($this ->controller)){
           
           $a = new $this -> controller;
           
           if(!is_null($this -> action) && method_exists($a, $this -> action)){
               
               $action = $this -> action;
               $a -> $action($this -> argument);
           }
       }
       else{
           require __DIR__ . '/../../src/View/404.html';
       }
   }
   
}