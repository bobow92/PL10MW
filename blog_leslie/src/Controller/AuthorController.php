<?php 
namespace Controller;
class AuthorController extends Controller
{
    public function afficheAll(){
        $authors = $this -> getModel() -> getAllAuthors();
        
        $params = array(
            'authors' => $authors,
        );
        return $this -> render('layout.html', '/../Base/profils.html', $params);
    }
    
    public function affiche($id){
        $authors = $this -> getModel() -> getAuthorById($id);
    
        
        $params = array(
            'authors' => $authors,
        );
        return $this -> render('template.html', '/../Base/profil.html', $params);
    }
    
    public function register(){
        
                if(!empty($_POST['name'])){
                    $name  = filter_var($_POST['name'],FILTER_SANITIZE_STRING );
                    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING );
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL ); 
                    $mdp = filter_var($_POST['password'], FILTER_SANITIZE_STRING );
                    $birth_date = filter_var($_POST['birth_date'], FILTER_SANITIZE_STRING );
 
                  
                    if (!empty($_POST['name']) || !empty($_POST['firstname']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['birth_date']))
                    {
                        $headers = 'From: ' . $email . '\r\n';
                        $myEmail = 'contact@boris-aubrun.com'; 
                        $subject = "Confirmation d'inscription";
                        $register = $this -> getModel() -> registerAuthor();
                        $params = array(
                            'title' => 'inscription',
                            'register' => $register,
                        );
                    }

                
                }
                else{
                        $register = 'fail';
                        $params = array(
                        'title' => 'inscription',
                        'register' => $register
                        );
                    }

                return $this -> render('template.html', '/../Base/inscription.html', $params);  
       
    }


    public function connexion($infos){
        $userget = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username   = $_POST['email']; 
                $password   = $_POST['password'];
                $hashedPass = sha1($password); 
                $userget    = $this -> getModel() ->connexion();

                       $params= array(
        'title' => 'connexion',
        );
  
        } 

        else{
            $connexion = 'fail';
            $params = array(
            'title' => 'connexion',
            );
        }

 
                
        
    
    return $this -> render('template.html', '/../Base/connexion.html', $params); 
        


      
   


    }
   public function forgetmenot($infos){
    var_dump($_POST);
   }
        
    public function delete($id){
                 $delauth = $this -> getModel() -> deleteAuthorById($id);
        
                 return $this -> render('layout.html', '/../Base/admin.html', $params);
    }



    public function getArticleByCategory(){

    }
}
