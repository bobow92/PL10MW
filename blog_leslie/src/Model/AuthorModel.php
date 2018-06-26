<?php
namespace Model;
use PDO;
class AuthorModel extends Model
{
    
    public function getAllAuthors(){
        return $this -> findAll();
    }
    public function getAuthorById($id){
        $requete = "SELECT DISTINCT * from article, author, commentaire where author.id_author = article.id_author and commentaire.id_article = article.id_article and author.id_author = ". $id;
        $resultat = $this -> getDb() -> query($requete);

        $donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);  
     
        if(!$donnees){
            return false;
        }
        else{
            return $donnees;
        }
    
    }
    public function deleteAuthorById($id){
        return $this -> delete($id);
    }
	public function registerAuthor(){

        $requete = "INSERT INTO author (name, firstname, email, password, hash_validation, birth_date) VALUES (:name, :firstname, :email, :password, :hash_validation, :birth_date)";
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> execute(array(
            ':name'=>$_POST['name'],
            ':firstname'=>$_POST['firstname'],
            ':email'=>$_POST['email'],
            ':password'=>sha1($_POST['password']),
            ':hash_validation'=>sha1($_POST['password']),
            ':birth_date'=>$_POST['birth_date'],
            ));
  
     }
     public function connexion(){
         
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                // Verification :si les $_POST sont vides
            $email   = $_POST['email']; 
            $password   = sha1($_POST['password']); 
       
            $requete = "SELECT * FROM author WHERE email = :email AND password = :password";
            $resultat = $this -> getDb() -> prepare($requete);
            $resultat -> execute(array(
                ':email'=>$email,
                ':password'=>$password)
            );

                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // Verification : SI le mail est valide
                    $rowcount = $resultat -> rowCount();
                     if ($rowcount > 0) {
                        // Verification : Si la requete SQL a retourner au moins 1 élément.. il doit y en avoir qu'un seul!!
                    $result = $resultat->fetch();
                    $_SESSION['id_author'] = $result['id_author'];
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['firstname'] = $result['firstname'];
                    $_SESSION['power'] = $result['power'];
                    header("Location: ".$url."../../index.php");
                    }
                    else{
                        $erreur3 = '<p style="color: red!important;">Mauvais Email ou Mot de passe</p>';
                    }

                }

        }
        else{
            $erreur2 = '<p><strong style="color: blue!important;">Veuillez insérer vos identifiants</strong></p>';    
        }
        
    }

    public function deconnexion(){

        if(isset($_SESSION['id_author'])){

        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: ".$url."connexion/connexion.html");
        }
    }
}
