<?php
namespace Model;
use PDO;
class ArticleModel extends Model
{
    
    public function getAllArticles(){
        $requete = "SELECT DISTINCT  article.*, author.* FROM article LEFT JOIN author ON article.id_author = author.id_author ORDER BY date_publication DESC";
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
       $requete = "SELECT * FROM article, author, commentaire  WHERE article.id_author = author.id_author and article.id_article = commentaire.id_article AND article.id_article = ". $id;
       $resultat = $this -> getDb() -> query($requete);

       $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);
       
       if (!$donnees) {
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


    public function deleteArticleById($id){
        return $this -> delete($id);
    }

    public function registerArticle(){
        $requete = "INSERT INTO article (title_article, content, category, date_publication, img_article, id_author) VALUES (:title_article, :content, :category, :date_publication, :hash_validation, :img_article, :id_author)";
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> execute(array(
            ':title_article'=>$_POST['title_article'],
            ':content'=>$_POST['content'],
            ':category'=>$_POST['category'],
            ':date_publication'=> now(),
            ':img_article'=>$FILE['img_article'],
            ':id_author'=>$_SESSION['id_author'],
            ));
    }
    
 
    


}
