<?php
namespace Model;
use PDO;
class AuthorModel extends Model
{
    
    public function getAllAuthors(){
        return $this -> findAll();
    }
    public function getAuthorById($id){
        return $this ->find($id);
    }
    public function deleteAuthorById($id){
        return $this -> delete($id);
    }
	public function registerAuthor($author){
        // $requete = "INSERT ";
        // $resultat = $this -> getDB() -> prepare($requete);
        // $resultat -> bindValue(':id_author', $auth, PDO::PARAM_STR);
        // $resultat -> execute();
    
        // $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\article');
    
        // $donnees = $resultat -> fetchAll();
    
        // if(!$donnees){
        //     return FALSE;
        // }else{
        //     return $donnees;
        
      return $this -> register($author);
     }
}
