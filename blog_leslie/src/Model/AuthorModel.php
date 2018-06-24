<?php
namespace Model;
use PDO;
class AuthorModel extends Model
{
    
    public function getAllAuthors(){
        return $this -> findAll();
    }
    public function getAuthorById($id){
        return $this ->find($id);
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
            ':password'=>md5($_POST['password']),
            ':hash_validation'=>md5($_POST['password']),
            ':birth_date'=>$_POST['birth_date'],
            ));
  
     }
     public function connexion(){
        //session_start();  
        session_start(); 
        print_r($_SESSION); 

        $email   = $_POST['email']; 
        $password   = $_POST['password'];
        $hashedPass = md5($password); 
     
        // check if user exist in BDD 

        $requete = "SELECT email, password FROM author WHERE email=:email AND password=:password ";
        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> execute(array(':email'=>$email, ':password'=>$hashedPass));
        $count = $resultat -> rowCount (); 

        // echo $count;

        if ($count < 0) {
            echo 'Welcome' . ' ' . $email; 
            $_SESSION['email'] = $email;
            header('Location: dashboard');
            exit();
        }


    }
}
