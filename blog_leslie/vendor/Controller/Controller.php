<?php

namespace Controller;

use Model, Config;

class Controller
{
    protected $model;
    protected $url;
    
    
    public function __construct(){
        $class = 'Model\\' .str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Model';
        
        $this -> model = new $class;

        $config = new Config;
        $site = $config -> getParametersSite();
        $this -> url = $site['url'];
    }
    
    public function getModel(){
        return $this -> model;
    }
    
    public  function render($layout, $view, $params){
        $dirView = __DIR__ . '/../../src/view/';
        $dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . '/';
        
        $path_view = $dirView . strtolower($dirFile) . $view;
        
       // echo '<pre>';
       // print_r($path_view);
       // echo '</pre>';
        $path_layout = $dirView . $layout;

        $params['url'] = $this -> url;
        
        extract($params);
        
        ob_start();
        
        require $path_view;
        $content = ob_get_clean();
        
        ob_start();
        require $path_layout;
        
        return ob_end_flush();
    }
}
