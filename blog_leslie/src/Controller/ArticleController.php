<?php 
namespace Controller;
class ArticleController extends Controller
{
    public function afficheAll(){
        
        $articles = $this -> getModel() -> getAllArticles();
        //$cc = new CategoryController;
       // $categories = $cc -> liste();
        
        $params = array(
            'articles' => $articles
        );
        return $this -> render('layout.html', '/../base/articles_view.html', $params);
    }
    
    public function affiche($id){
        $article = $this -> getModel() -> getArticleById($id);
        
        
        $params = array(
            'article' => $article,
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
