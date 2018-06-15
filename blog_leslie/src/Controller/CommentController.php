<?php
namespace Controller;
class CommentController extends Controller
{
    public function afficheAll(){
        $users = $this -> getModel() -> getAllComments();
        $cc = new CommentController;
        $comments = $cc -> liste();
        
        $params = array(
            'users' => $users,
            'comments' => $comments,
        );
        return $this -> render('layout.html', 'admin.html', $params);
    }
    
    public function affiche($id){
        $user = $this -> getModel() -> getCommentById($id);
        
        $cc = new CategoryController;
        $comments = $cc -> liste();
        
        $params = array(
            'user' => $user,
            'comments' => $comments,
        );
        return $this -> render('layout.html', 'admin.html', $params);
    }
}
