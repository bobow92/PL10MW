<?php
//vendor/autoload.php

class Autoload
{
    public static function inclusion_automatique($className){
        
        //on instancie postcontroller on donc a besoin du fichier postcontroller.php donc on requitre

        $tab = explode('\\', $className);    

        //grace au namespace on recupere le nom du dossier puis le nom du fichier
        //on va ensuite reconstituer le chemin du fichier
        
        if($tab[0] == 'Manager' || ($tab[0] == 'Model' && $tab[1] == 'Model') || ($tab[0] == 'Controller' && $tab[1] == 'Controller') ){
            $path = __DIR__ . '/' . implode('/', $tab) . '.php';
        }
        else{
            $path = __DIR__ . '/../src/' . implode('/', $tab) . '.php'; 
        }
        
       
        require $path;
    }
}

spl_autoload_register(array('Autoload', 'inclusion_automatique'));

