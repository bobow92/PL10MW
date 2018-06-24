<?php 
namespace Controller;
class AuthorController extends Controller
{
    public function afficheAll(){
        $donnees = $this -> getModel() -> getAllAuthors();
        
        $params = array(
            'donnees' => $donnees,
        );
        return $this -> render('layout.html', '/../Base/profils.html', $params);
    }
    
    public function affiche($id){
        $donnees = $this -> getModel() -> getAuthorById($id);
    
        
        $params = array(
            'donnees' => $donnees,
        );
        return $this -> render('template.html', '/../Base/profil.html', $params);
    }
    
    public function register(){
            $erreur1 = "";
            $erreur2 = "";
            $erreur3 = "";
            $erreur4 = "";
            $erreur0 = "";
                if(isset($_POST['forminscription'])){

                    $name  = htmlspecialchars($_POST['name']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $email = htmlspecialchars($_POST['email']);
                    $email2 = htmlspecialchars($_POST['email2']); 
                    $mdp = sha1($_POST['password']);
                    $mdp2 = sha1($_POST['password2']);
                    $birth_date = filter_var($_POST['birth_date'], FILTER_SANITIZE_STRING );
                   
                  
                    if (!empty($_POST['name']) || !empty($_POST['firstname']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['birth_date']))
                    {

                        
                        // $headers = 'From: ' . $email . '\r\n';
                        // $myEmail = 'contact@boris-aubrun.com'; 
                        // $subject = "Confirmation d'inscription";
                        $strname = strlen($name);
                        $strfirstname = strlen($firstname);
                        
                        if ($strname <= 255 || $strfirstname <= 255){

                            if($email == $email2){

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    
                                
                                    if ($mdp == $mdp2) {

                                        $erreur4 = '<p style="color: green;!important"> Votre compte a bien été crée.</p>';
                                        
                                        $authors = $this -> getModel() -> registerAuthor();
                                    }
                                    else{
                                        $erreur3 = '<p style="color: red!important;">vos mot de passe ne correspondent pas</p>';
                                    }
                                }   
                            }
                            else{
                                $erreur2 = '<p style="color: red;!important">vos adresses email ne correspondent pas.</p>';
                            }
                               
                        }
                        else{
                            $erreur1 = '<p style="color: red;!important">votre prénom ou nom dépasse 255 caractères.</p>';
                        }
                    }

                
                }
                else{
                    $erreur0 = '<p style="color: red;!important">Le formulaire doit être rempli entièrement.</p>';
                }
                $params = array(
                                        'title' => 'inscription',
                                        'erreur1' => $erreur1,
                                        'erreur2' => $erreur2,
                                        'erreur3' => $erreur3,
                                        'erreur4' => $erreur4,
                                        'erreur0' => $erreur0,
                                        );
                return $this -> render('template.html', '/../Base/inscription.html', $params);
              
       
    }


    public function connexion(){
            
            $erreur1 = "";
            $erreur2 = "";
           
            if (isset($_POST['connexionform'])) {
                $email = htmlspecialchars($_POST['email']);
                $password = sha1($_POST['password']);
                if (!empty($email) && !empty($password)) {
                    echo "GG";
                      $connexion = $this -> getModel() -> connexion();

                    
                }
                else{

                    $erreur2 = '<p style="color: red;!important">tous les champs doivent être completer.</p>';
                }
            }
            else{
                $erreur1 = '<p style="color: red;!important">Veuillez ecrire vos identifiants</p>';
            }
                
        
            $params = array(
            'title' => 'connexion',
             'erreur1' =>  $erreur1,
             'erreur2' =>  $erreur2,
            );
           
            return $this -> render('template.html', '/../Base/connexion.html', $params); 
        


      
   


    }
   public function deconnexion(){
            $donnees = $this -> getModel() -> deconnexion();
    
        
            $params = array(
                'donnees' => $donnees,
            );
            return $this -> render('template.html', '/../Base/connexion.html', $params);
   
   }
        
    public function delete($id){
                 $delauth = $this -> getModel() -> deleteAuthorById($id);
        
                 return $this -> render('layout.html', '/../Base/admin.html', $params);
    }

}
