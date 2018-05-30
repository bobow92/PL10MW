<?php

session_start();
require __DIR__ .'/../vendor/autoload.php';

$a = new Manager\Application;
$a -> run();

// $app = new Application;
// $app -> run();

// // TEST 1 : Entity
// $p = new Entity\Post;
// $p -> setTitle_article('Mon super article');
// echo $p -> getTitle_article();
// // URL à tester : blog/web/index.php


// // TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance();
// $db = $pdom -> getPdo();

// $resultat = $db -> query("SELECT * FROM Author");
// $authors = $resultat -> fetchAll();
// echo "<pre>";
// print_r($authors);
// echo "</pre>";


// // TEST 3  :

// $pm = new Model\PostModel;

// // echo "<pre>";
// // print_r($pm -> getAllPosts());
// // echo "</pre>";

// // TEST 4  :

// $pc = new Controller\PostController;
// $pc -> afficheAll();


// // TEST 5  : test des URLs : 
// //index.php?controller=post&action=afficheall

// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];

// if(isset($_GET['arg'])){
//     $arg = $_GET['arg'];
// }
// else{
//     $arg = '';
// }

// $a = new $controller; 
// //$a = new Controller\PostsController;

// $a -> $action($arg);
// //$a -> afficheall();
