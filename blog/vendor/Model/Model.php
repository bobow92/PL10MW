<?php

//vendor/Model/Model.php

namespace Model;

use PDO;
use Manager\PDOManager;

class Model
{
    private $db; // Contiendra notre connexion à la bdd
    
    public function __construct(){
        $this -> db = PDOManager::getInstance() -> getPdo();
    }
    
    public function getDb(){
        return $this -> db;
    }

    public function getTableName(){
        $table = strtolower(str_replace(array('Model\\', 'Model'), '', get_called_class()));
        
        /*
        
        $pm = new Mode\ArticleModel;
        Modem\articlemodel
        article
        permet d'interroger la table post de la bddd


        A partir du nom de la classe solicité, on peut récfuperer le nom de l'entité, ou du moins
        de la table à interroger    

        */ 

        return $table;
    }
    
    
    //-------------------------------
    // REQUETES GÉNÉRIQUES : 
    //-------------------------------

    
    // récupère toutes les infos d'une table : 
    public function findAll(){
        
        $requete = "SELECT * FROM " . $this -> getTableName();
        // Cela fait une requete "Select * FROM post" si je suis sur l'entité post.
      
       $resultat = $this -> getDb() -> query($requete);
        // $resultat : PDOStatement, inexploitable
        // fetch() ou fetchAlll()
       $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
      
        // SetFetchMode, avec l'argument PDO::FETCH_CLASS,
        // permet de récupérer nos résultats de requête forme d'objets...
        // ... Objets de la classe Entity\Article ou Entity\Author etc...
        // en fonction de l'entité dans laquelle nous sommes 

       $donnees = $resultat -> fetchAll(); 
      
       if(!$donnees){
          return FALSE; 
       }
       else{
           return $donnees;
       } 
    }
    
    // récupère les infos d'une table en fonction de l'id : 
    public function find($id){
        $requete = "SELECT * FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . "=:id";
        
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindValue(':id', $id, PDO::PARAM_INT);
        $resultat -> execute();
        
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
        
        $donnees = $resultat -> fetch();
        
        if(!$donnees){
            return FALSE;
        }
        else{
            return $donnees;
        }
    }
    
    // Méthode générique pour supprimer un enregistrement
    public function delete($id){
        $requete = "DELETE FROM " . $this -> getTableName() . ' WHERE id_' . $this -> getTableName() . ' = :id';
        
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindValue(':id', $id, PDO::PARAM_INT);    
        
        return $resultat -> execute();
    }
    
    //Méthode générique pour modifier un enregistrement avec la requete UPDATE
    public function update($id, $infos){
        $newValues = '';
        $first = FALSE; 
        foreach($infos as $key => $value){
            if($first == FALSE){
                $newValues .= " $key = :$key ";
                $first = TRUE;
            }
            else{
                $newValues .= ", $key = :$key ";
            }
        }

        $requete = "UPDATE " . $this -> getTableName() ." set " . $newValues . " WHERE id_". $this -> getTableName() . "=:id";
        
        
        //echo $requete; 
        $resultat = $this -> getDb() -> prepare($requete);
        $infos['id'] = $id;

        return $resultat -> execute($infos);
    }
    
    //Méthode générique pour ajouter un enregistrement
    public function register($infos){    
        $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')'; 
        
        $resultat = $this -> getDb() -> prepare($requete);
        
        if($resultat -> execute($infos)){
            return $this -> getDb() -> lastInsertId();
        }
        else{
            return false;
        }
    }

}