<?php 

namespace Model;
use PDO, \Manager\PDOManager;

class Model
{
    private $db;
    
    public function __construct(){
        $this -> db = PDOManager::getInstance() -> getPdo();
    }
    
    public function getDb(){
        return $this -> db;
    }
    
    public function getTableName(){
        $table = strtolower(str_replace(array('Model\\','Model'), '', get_called_class()));
        
        return $table;
    }


public function findAll(){
    
    $requete = "SELECT * FROM " . $this -> getTableName() . " ORDER BY date_publication DESC ";
    
    $resultat = $this -> getDb() -> query($requete);
    
    $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
    
    $donnees = $resultat -> fetchAll();
    
    if(!$donnees){
        return FALSE;
    }
    else{
        return $donnees;
    }
}

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

public function delete($id){
        $requete = "DELETE FROM " . $this -> getTableName() . ' WHERE id_' . $this -> getTableName() . ' = :id';
        
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindValue(':id', $id, PDO::PARAM_INT);    
        
        return $resultat -> execute();// renvoi false ou true
    }

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

public function register($infos){    
        $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')'; 
        
        $resultat = $this -> getDb() -> prepare($requete);

        if (empty($_POST) && $resultat) {
            echo "Les champs sont vides.";
        }
        
        else{

            if($resultat -> execute($infos)){
            
            return true;
           
            }
            
            else{
            
                return false;
            }
        }

    }

}
//public function  sortByAlphabet(){
//    $requete = "SELECT * FROM " . $this -> getTableName() . "ORDER BY"  . $this -> getTableName()
//}
