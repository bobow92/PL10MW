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
        $donnees = $this -> getModel() -> getArticleById($id);

        
        $comment = $this -> getModel() -> registerCommentaire($id);
    
        $params = array(
          
            'donnees' => $donnees,
            'comment' => $comment,
        );

        return $this -> render('template.html','/../base/view_articles.html', $params);
    }
    
    public function afficheByAuthor($auth){
        $donnees = $this ->getModel() -> getArticleByAuthor();
        
        
        $params = array(
            'title' => 'Category',
            'donnees' => $donnees,
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


    public function createCommentaire(){

        $donnees = $this -> getModel() -> registerCommentaire($id);
   
        $params = array(
          
            'donnees' => $donnees,
        );

        return $this -> render('template.html','/../base/view_articles_comment.html', $params);
    }

    public function createArticle(){
            $erreur1 = "";
            $erreur2 = "";
            $erreur3 = "";
            $erreur4 = "";
            $erreur0 = ""; // création des méssages d'erreurs
                if(isset($_POST['formarticle'])){// Verification : si le formulaire existe
                    if (!empty($_POST['title_article']) || !empty($_POST['content']) || !empty($_POST['category']) || !empty($_POST['img_article'])){
                    $title_article = htmlspecialchars($_POST['title_article']);// Verification : définit comme un contenu html
                    $content = htmlspecialchars($_POST['content']);
                    $category = htmlspecialchars($_POST['category']);
                    $strtitle_article = strlen($title_article);
                    $strcontent = strlen($content);
                    $word_name = $_FILES['img_article']['name'];
                    $word_type = $_FILES['img_article']['type'];
                    $word_size = $_FILES['img_article']['size'];   
                        if ($strtitle_article <= 255 || $strcontent <= 1500){

                                if ($_POST['category'] == "Categorie1" || $_POST['category'] == "Categorie2" || $_POST['category'] == "Categorie3" || $_POST['category'] == "Categorie4" || $_POST['category'] == "Categorie5"){

                                     if($_FILES['img_article']['type'] == 'image/png'){
                                          
                                         $word_tmp_name= $_FILES['img_article']['tmp_name'];
                                         $slash = "\/";
                                         move_uploaded_file($word_name.$word_type.$word_size, "blog_leslie\web\upload".time().$word_tmp_name);
                                        
                                          
                                         
                                         $erreur4 = '<p><strong style="color: green;!important">Votre article a bien été ajouter :).</strong></p>';
                                          $authors = $this -> getModel() -> registerArticle(); 

                                     }
                                    
                                    else {
                                            $erreur4 = '<p><strong style="color: red;!important">L image doit être de type JPG, PNG ou GIF</strong></p>';
                                        }    

                                 }
                                else{

                                    $erreur3 = '<p><strong style="color: red;!important">Veillez à ne pas modifier l html ou sinon je vous retrouve.</strong></p>';
                                }       
                        }
                        else{
                            $erreur1 = '<p><strong style="color: red;!important">Le titre ne peut exceder les 255 caractères. Le contenu ne peut exceder les 1500 caractères</strong></p>';
                        }
                    
                    }
                    else{
                        $erreur0 = '<p><strong style="color: red;!important">Veuillez remplir les champs.</strong></p>';
                    }
                
                }
                else{
                    $erreur0 = '<p><strong style="color: blue;!important">Le formulaire doit être rempli entièrement.</strong></p>';
                }
                $params = array(
                                        'title' => 'inscription',
                                        'erreur1' => $erreur1,
                                        'erreur2' => $erreur2,
                                        'erreur3' => $erreur3,
                                        'erreur4' => $erreur4,
                                        'erreur0' => $erreur0,
                                        );
                return $this -> render('template.html', '/../Base/admin.html', $params);
              
    }
}

//echo'<pre>';
//echo'ENFIN !!!!!!!';
//echo'<pre>';
