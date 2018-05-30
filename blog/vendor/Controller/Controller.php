<?php

//vendor/Controller/Controller.php

namespace Controller;

use Model;

class Controller
{
    protected $model; // Contiendra un bojet du modle correspondant à l'entité dans laquelle nous sommes : PostController => PostModel 
    
    public function __construct(){
        $class = 'Model\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Model';
        //$class = Model\ . Controller\PostController . Model
        // Cela transforme Controller\PostController en Model\PostModel
        // Donc cela permet d'aller chercher le model qui nous correspond 
    	
        $this -> model = new $class;
 		// J'instancie le model attendu et le stock dans $this -> model
      	
    
    }
    
    public function getModel(){
         return $this -> model; 
    }    
    // Cette fonction nous retourne notre objet model.
    public function render($layout, $view, $params){
        
       $dirView = __DIR__ . '/../../src/View/';
       
       $path_view = $dirView . $view;
       
       $path_layout = $dirView . $layout;
       
       extract($params);
       
       ob_start();
       
       require $path_view;
       $content = ob_get_clean();
       
       ob_start();
       require $path_layout;
       
       return ob_end_flush();
    }
}