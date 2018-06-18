<?php 
namespace Controller;
class ArticleController extends Controller
{
    public function afficheAll(){
       
        $articles = $this -> getModel() -> getAllArticles();
       // var_dump($articles);
        // $authors = $this -> getModel() -> getAllAuthors();
         // $auth = $this -> getModel() -> getArticleByAuthor();
         // var_dump($auth);
 
        $params = array(
            'articles' => $articles,
            // 'auth' => $auth,
       
        );
        return $this -> render('layout.html', '/../base/articles_view.html', $params);
    }
    
    public function affiche($id){
        $articles = $this -> getModel() -> getArticleById($id);
     
        
        $params = array(
          
            'articles' => $articles,
        );
        return $this -> render('layout.html','/../base/view_articles.html', $params);
    }
    
    public function afficheByAuthor($auth){
        $articles = $this ->getModel() -> getArticleByAuthor($auth);
        
        
        $params = array(
            'articles' => $articles,
        );
        
        return $this -> render('layout.html','/../base/profil.html', $params);
    }


    // public function afficheLastArticles(){
    //     $articles = $this ->getModel() -> getLastArticles();
    // }

    public function afficheByCategory($auth){
        $articles = $this ->getModel() -> getArticleByCategory($auth);
        
        
        $params = array(
            'articles' => $articles,
        );
        
        return $this -> render('layout.html','/../base/category.html', $params);
    }
}

//echo'<pre>';
//echo'ENFIN !!!!!!!';
//echo'<pre>';
