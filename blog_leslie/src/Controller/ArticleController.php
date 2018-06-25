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
   
        $params = array(
          
            'donnees' => $donnees,
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


    public function createArticle(){
         $erreur1 = "";
            $erreur2 = "";
            $erreur3 = "";
            $erreur4 = "";
            $erreur0 = "";
                if(isset($_POST['formarticle'])){

                    $title_article  = htmlspecialchars($_POST['title_article']);
                    $content = htmlspecialchars($_POST['content']);
                    $category = htmlspecialchars($_POST['category']);
                    $img_article = $_FILE['img_article'];
                    echo("<pre>");
                    var_dump($_POST);
                    echo("</pre>");
                    echo("<pre>");
                    var_dump($_FILE);
                    echo("</pre>");

                    if (!empty($_POST['title_article']) || !empty($_POST['content']) || !empty($_POST['category']) || !empty($_FILE['img_article']))
                    {

                 
                        $strtitle_article = strlen($title_article);
                        $strcontent = strlen($content);
                        
                        if ($strtitle_article <= 255 || $strcontent <= 1500){

                            if($email == $email2){

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    
                                
                                    if ($mdp == $mdp2) {

                                        $erreur4 = '<p><strong style="color: red;!important">Votre compte a bien été crée.</strong></p>';
                                        
                                        $authors = $this -> getModel() -> registerArticle();
                                    }
                                    else{
                                        $erreur3 = '<p><strong style="color: red;!important">vos mot de passe ne correspondent pas</strong></p>';
                                    }
                                }   
                            }
                            else{
                                $erreur2 = '<p><strong style="color: red;!important">vos adresses email ne correspondent pas.</strong></p>';
                            }
                               
                        }
                        else{
                            $erreur1 = '<p><strong style="color: red;!important">votre prénom ou nom dépasse 255 caractères.</strong></p>';
                        }
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
