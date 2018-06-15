<?php
namespace Controller;
class NewsletterController extends Controller
{
    public function afficheAll(){
        $users = $this -> getModel() -> getAllnewsletter();
        $cc = new CategoryController;
        $newsletter = $cc -> liste();
        
        $params = array(
            // 'users' => $users,
            'newsletter' => $newsletter,
        );
        return $this -> render('layout.html', 'admin.html', $params);
    }
    
    public function affiche($id){
        $user = $this -> getModel() -> getnewsletterById($id);
        
        $cc = new CategoryController;
        $newsletter = $cc -> liste();
        
        $params = array(
            // 'user' => $user,
            'newsletter' => $newsletter,
        );
        return $this -> render('layout.html', 'admin.html', $params);
    }
}
