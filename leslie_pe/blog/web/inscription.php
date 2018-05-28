<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/blog.css">
  <style>
  
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a class="white"  href="#">ACCUEIL</a></li>
        <li><a class="white"  href="#">PRENDRE RENDEZ-VOUS</a></li>
        <li><a href="index.php">BLOG</a></li>
        <li><a class="white"  href="#">A PROPOS</a></li>
        <li><a class="white"  href="#">FAQ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a  class="actived" class="white"  href="inscription.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a class="white"  href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

 
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav asidecateg ">
      <h4>Catégorie :</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a class="actived" href="#section1">Toute les catégories</a></li>
        <li><a href="#section2">Catégorie 1</a></li>
        <li><a href="#section3">Catégorie 2</a></li>
        <li><a href="#section3">Catégorie 3</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <h4>S'Abonner :</h4>
      <ul class="nav nav-pills nav-stacked">
          <li>
             <input type="text" class="form-control" placeholder="...@mail.fr">
          </li>
        </ul>
    </div>
    <div class="col-sm-9">
      <hr>
      <form>
        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">Prénom</span>
          <input type="text" class="form-control" placeholder="Prénom" aria-describedby="sizing-addon1">
        </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">Nom</span>
          <input type="text" class="form-control" placeholder="Nom" aria-describedby="sizing-addon1">
        </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">Mot de passe</span>
          <input type="password" class="form-control" placeholder="Mot de passe" aria-describedby="sizing-addon1">
        </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">Email</span>
          <input type="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
        </div>

        <div class="input-group input-group-lg">
          <input type="submit" class="form-control fc2" name="" value="Envoyer">
        </div>
      </form>

    </div>
  </div>
</div>








<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
