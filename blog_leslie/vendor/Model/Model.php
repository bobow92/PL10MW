<?php

//vendor/Model/Model.php

namespace Model; 
use PDO, \Manager\PDOManager; 

//use PDO;
//use Manager\PDOManager;

class Model
{
    private $db; // Contiendra notre objet PDO
    
    public function __construct(){
        $this -> db = PDOManager::getInstance() -> getPdo();
        // Lorsque j'instancie un objet Model (ou un enfant de cette classe), la fonction construct() se lance, créer un objet PDO (grâce à PDOManager) et le stock dans la propriété $db. 
    }
    
    public function getDb(){
        return $this -> db;
        // cette fonction me retourne l'objet pdo stocké dans $db.
    }

    public function getTableName(){
        
        // get_called_class() est une fonction qui me retourne le nom de la classe dans laquelle nous sommes.
        // Model\ProduitModel
        // ''Produit''
        // produit
        
        $table = strtolower(str_replace(array('Model\\', 'Model'), '', get_called_class()));
        
        return $table;  
        
        // Au moment où je ferai appel à cette méthode, je serai dans la classe ProduitModel, ou MembreModel ou CommandeModel etc...
        // Et donc cette fonction est capable de récupérer le nom de la classe et d'en extraire le nom de la table correspondante. 
    }
    
    
    //-------------------------------
    // REQUETES GENRIQUES : 
    //-------------------------------

    
    // récupère toutes les infos d'une table : 
    public function findAll(){
        
        $requete = "SELECT * FROM " . $this -> getTableName();
      //$requete = "SELECT * FROM produit";
       
       $resultat = $this -> getDb() -> query($requete);
      //$resultat = $pdo -> query("SELECT * FROM produit");
       
       $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
       /*
       setFetchMode() permet d'instancier un objet (dans notre cas un objet Entity\Produit), en prenant les résultats de notre requêtes et en affectant les valeurs dans les propriétés de mes objets. Pour que cela fonctionne sans accroc, il faut ABSOLUMENT que les noms des champs dans les tables correspondent aux noms des propriétés dans les objets/Entity (POPO)
       
       $objet = new Entity\Produit;
       $objet -> titre = 'mon super produit'
       $objet -> id_produit = 12
       etc...
       */
       
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
      //$requete = "SELECT * FROM produit WHERE id_produit = :id"
        
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
    public function update($id, $infos)
    {
        $newValues = '';
        $first = FALSE; 
        foreach($infos as $key => $value){
            if($first == FALSE)
            {
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
        // la ligne ci-dessous est pour ajouter notre id passé en parametre dans l'array de la méthode execute(); 
        return $resultat -> execute($infos);
    }
    
    //Méthode générique pour ajouter un enregistrement
    public function register($infos){   
        $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';
        
        //echo $requete; 
        
        $resultat = $this -> getDb() -> prepare($requete);
        
        if($resultat -> execute($infos)){
            return $this -> getDb() -> lastInsertId();
        }
        else{
            return false;
        }
    }
    
    
    
    
}



