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
        $author = $this -> getModel() -> getAuthorById($id);
    
        
        $params = array(
            'authors' => $authors,
        );
        return $this -> render('layout.html', '/../Base/profil.html', $params);
    }
    
    public function register($infos){
 

        $_POST['name'];

                if(!empty($_POST)){
                    $this -> getModel() -> register($infos); 
                    $infos = array(
                    'name' => $_POST['name'],
                    'firstname' => $_POST['firstname'],
                    'email' => $_POST['email'],
                    'birth_date' => $_POST['birth_date'],
                    'password' => $_POST['password'],
                    'hash_validation' => sha1($_POST['password']),
                    'power' =>  '0',
                );
                   
                return $this -> render('template.html', '/../Base/inscription.html', $infos);    
                // Vérification des infos en Post : 

                
                }
                else {
               
                return $this -> render('template.html', '/../Base/inscription.html', $infos);    
                }

       
    }
    
        
    public function delete($id){
                 $delauth = $this -> getModel() -> deleteAuthorById($id);
        
                 return $this -> render('layout.html', '/../Base/admin.html', $params);
    }



    public function connexion($infos){

                // $infos = array(
                //     'email' => $_POST['email'],
                //     'password' => $_POST['password'],

                // );
                var_dump($_POST);


                 return $this -> render('template.html', '/../Base/connexion.html', $infos);
    }



}
