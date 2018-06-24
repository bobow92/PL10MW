<?php
namespace Model;
use PDO;
class ArticleModel extends Model
{
    
    public function getAllArticles(){
        $requete = "SELECT article.*, author.* FROM article LEFT JOIN author ON article.id_author = author.id_author ORDER BY date_publication DESC";
        $resultat = $this -> getDb() -> query($requete);

        $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);  
     
        if(!$donnees){
            return false;
        }
        else{
            return $donnees;
        }
    }

    public function getArticleByCategory($category){
         $requete = "SELECT article.*, author.* FROM article LEFT JOIN author ON article.id_author = author.id_author WHERE category = '".$category."'  ORDER BY date_publication DESC";
        $resultat = $this -> getDb() -> query($requete);

        $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);  
     
        if(!$donnees){
            return false;
        }
        else{
            return $donnees;
        }

    }

    public function getArticleById($id){
       $requete = "SELECT * from article, author, comment where article.id_author = author.id_author and comment.id_article = article.id_article and article.id_article = ". $id;
       $resultat = $this -> getDb() -> query($requete);

       $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);
       
       if (!$donnees) {
           return false;
       }
       else{
            return $donnees;
       }

    }
    public function deleteArticleById($id){
        return $this -> delete($id);
    }
    public function registerArticle($infos){
        return $this -> register($infos);
    }
    
    public function getAuthorByArticle($auth){
        // $requete ="SELECT * FROM article LEFT JOIN author ON article.id_author = author.id_author WHERE author.id_author = article.id_author";
        // // $requete = "SELECT article. * FROM article LEFT JOIN author ON article.id_author WHERE author.id_author = :id_author";
        // $resultat = $this -> getDB() -> prepare($requete);
        // $resultat -> bindValue(':id_author', $auth, PDO::PARAM_STR);
        // $resultat -> execute();
    
        // $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\article');
    
        // $donnees = $resultat -> fetchAll();
    
        // if(!$donnees){
        //     return FALSE;
        // }else{
        //     return $donnees;
        // }
    }
    


}
