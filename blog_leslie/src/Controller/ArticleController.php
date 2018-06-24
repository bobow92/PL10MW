<?php 
namespace Controller;
class ArticleController extends Controller
{
    public function afficheAll(){
       
        $donnees = $this -> getModel() -> getAllArticles();

        $params = array(
 
            'donnees' => $donnees,
        );

     

        return $this -> render('layout.html', '/../base/articles_view.html', $params);
    }
    
    public function affiche($id){
        $articles = $this -> getModel() -> getArticleById($id);
   
        $params = array(
          
            'articles' => $articles,
        );

        return $this -> render('template.html','/../base/view_articles.html', $params);
    }
    
    public function afficheByAuthor($auth){
        $articles = $this ->getModel() -> getArticleByAuthor();
        
        
        $params = array(
            'title' => 'Category',
            'articles' => $articles,
        );
        
        return $this -> render('layout.html','/../base/profil.html', $params);
    }


 
    public function afficheByCategory($category){
        $donnees = $this ->getModel() -> getArticleByCategory($category);
        
        
        $params = array(
            'donnees' => $donnees,
        );
        
        return $this -> render('layout.html','/../base/category.html', $params);
    }
}

//echo'<pre>';
//echo'ENFIN !!!!!!!';
//echo'<pre>';
