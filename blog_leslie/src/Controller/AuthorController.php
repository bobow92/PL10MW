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
            // créer au préalables les messages d'erreurs.
                if(isset($_POST['forminscription'])){
                    // Verification : Si le formulaire existe..
                    $name  = htmlspecialchars($_POST['name']);
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $email = htmlspecialchars($_POST['email']);
                    $email2 = htmlspecialchars($_POST['email2']); 
                    $mdp = htmlspecialchars(sha1($_POST['password']));
                    $mdp2 = htmlspecialchars(sha1($_POST['password2']));
                    $birth_date = htmlspecialchars($_POST['birth_date']);
                   // Verification : contenu Html et protégé des injections SQL
                  
                    if (!empty($_POST['name']) || !empty($_POST['firstname']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['birth_date']))
                    {
                        // Verification :si le formulaire est vide..
                        
                        // $headers = 'From: ' . $email . '\r\n';
                        // $myEmail = 'contact@boris-aubrun.com'; 
                        // $subject = "Confirmation d'inscription";
                        $strname = strlen($name);
                        $strfirstname = strlen($firstname);
                        $strmdp = strlen($_POST['password']);
                            
                        if ($strname <= 255 || $strfirstname <= 255){
                        // Verification : string Name et firstname ne plante pas la Bdd
                            if(filter_var($email, FILTER_VALIDATE_EMAIL) && $email == $email2){
                                // Verification : si les mails sont valides et identiques
                                if (ctype_alpha($name) && ctype_alpha($firstname)) {
                                     // Verification : si name et firstname sont alphabétiques
                                
                                    if ($mdp == $mdp2) {
                                        // Verification :si les mdp sont identiques
                                        if ($strmdp >= 8) {
                                            // Verification :si le mdp est supérieur ou égale à 8 caractères..
                                            $erreur4 = '<p><strong style="color: green;!important">Votre compte a bien été crée.</strong></p>';
                                        
                                             $authors = $this -> getModel() -> registerAuthor();
                                        }
                                        else{
                                            $erreur4 = '<p><strong style="color: red;!important">Votre mot de passe dans être supérieur ou égale à 8 caractères.</strong></p>';
                                        }
                                    }
                                    else{
                                        $erreur3 = '<p><strong style="color: red;!important">vos mot de passe ne correspondent pas</strong></p>';
                                    }
                                }
                                else{

                                    $erreur2 = '<p><strong style="color: red;!important">Votre Nom et Prénom doit être alphabétique.</strong></p>';
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
                return $this -> render('template.html', '/../Base/inscription.html', $params);
              
       
    }


    public function connexion(){
            
            $erreur1 = "";
            $erreur2 = "";
           
            if (isset($_POST['connexionform'])) {
                // Verification :si le formualire existe
                $email = htmlspecialchars($_POST['email']);
                $password = sha1($_POST['password']);
                // Hashing des mdp
                if (!empty($email) && !empty($password)) {
                     // Verification : si les post MAIL sont vides.
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
