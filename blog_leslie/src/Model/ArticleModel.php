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

    public function registerCommentaire($id){
        $requete = "INSERT INTO commentaire (content_comment, date_publication_comment, id_article, id_author) VALUES (:content_comment, now(), :id_article, :id_author)";
        $resultat = $this -> getDb() -> prepare($requete);
        
        if(isset($_POST['content_comment'])){
        $resultat -> execute(array(
            ':content_comment'=>$_POST['content_comment'],  
            ':id_author'=>$_SESSION['id_author'],
            ':id_article'=>$id,
            ));

        }
        else{
            return false;
        }
    }

    public function registerArticle(){
        $requete = "INSERT INTO article (title_article, content, category, date_publication, img_article, id_author) VALUES (:title_article, :content, :category, now(), :img_article, :id_author)";
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> execute(array(
            ':title_article'=>$_POST['title_article'],
            ':content'=>$_POST['content'],
            ':category'=>$_POST['category'], 
            ':img_article'=>$_FILES['img_article']['name'],
            ':id_author'=>$_SESSION['id_author'],
            ));


    }
    
 
    


}
