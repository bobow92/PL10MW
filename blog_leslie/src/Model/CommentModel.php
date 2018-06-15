<?php
namespace Model;
use PDO;
class CommentkModel extends Model
{
    
    public function getAllComments(){
        return $this -> findAll();
    }
    public function getCommentById($id){
        return $this -> find($id);
    }
    public function deleteCommentById($id){
        return $this -> delete($id);
    }
    public function registerComment($infos){
        return $this -> register($infos);
    }
    
    public function getCommentByAuthor($auth){
        $requete = "SELECT comment. * FROM comment LEFT JOIN author ON book.id_book WHERE author.id_author = :id_author";
        $resultat = $this -> getDB() -> prepare($requete);
        $resultat -> bindValue(':id_author', $auth, PDO::PARAM_STR);
        $resultat -> execute();
    
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
    
        $donnees = $resultat -> fetchAll();
    
        if(!$donnees){
            return FALSE;
        }else{
            return $donnees;
        }
    }
    

}
