<?php
namespace Model;
use PDO;
class ArticleModel extends Model
{
    
    public function getAllArticles(){
        return $this -> findAll();
    }
    public function getArticleById($id){
        return $this -> find($id);
    }
    public function deleteArticleById($id){
        return $this -> delete($id);
    }
    public function registerArticle($infos){
        return $this -> register($infos);
    }
    
    public function getArticleByAuthor($auth){
        $requete ="SELECT * FROM article LEFT JOIN author ON article.id_author = author.id_author WHERE author.id_author = article.id_author";
        // $requete = "SELECT article. * FROM article LEFT JOIN author ON article.id_author WHERE author.id_author = :id_author";
        $resultat = $this -> getDB() -> prepare($requete);
        $resultat -> bindValue(':id_author', $auth, PDO::PARAM_STR);
        $resultat -> execute();
    
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\article');
    
        $donnees = $resultat -> fetchAll();
    
        if(!$donnees){
            return FALSE;
        }else{
            return $donnees;
        }
    }
    


}
