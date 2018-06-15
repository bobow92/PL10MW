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
            'author' => $author,
        );
        return $this -> render('layout.html', '/../Base/profil.html', $params);
    }
    
    public function inscription($infos){
        
        $regauth = $this -> getModel() -> registerAuthor($infos);
        return $this -> render('template.html', '/../Base/inscription.html', $params);
    }
    
    public function delete($id){
        $delauth = $this -> getModel() -> deleteAuthorById($id);
        
        return $this -> render('layout.html', '/../Base/admin.html', $params);
    }
}
