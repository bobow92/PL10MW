<?php
//vendor/autoload.php

class Autoload
{
   public static function inclusion_automatique($className){

               
       $tab = explode('\\', $className);    
       
       if($tab[0] == 'Manager' || ($tab[0] == 'Model' && $tab[1] == 'Model') || ($tab[0] == 'Controller' && $tab[1] == 'Controller') ){
           $path = __DIR__ . '/' . implode('/', $tab) . '.php';
       }
       else{
           $path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';
       }
       
       //---------------------------------------------
       // echo '<pre>Autoload : ' . $className . '<br/>';
       // echo '===> Require(' . $path . ') </pre>';
       // //--------------------------------------------
       
       require $path;
   }
}
//----------------------------------------------------------------
spl_autoload_register(array('Autoload', 'inclusion_automatique'));
//----------------------------------------------------------------