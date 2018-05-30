<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
<style>
	*{
		font-family: 'Amatic SC', cursive;
	}
	body{

		display: inline ;
		overflow-x: hidden;
		margin: 0px;
		padding:0px;
		background-image: url('images/bg.jpg');

		font-family: 'Mina', sans-serif;
		
	}
	header{
			height: 200px;
			width: 100%;
			background-color: #467F49;
		}

	footer{
		height: 200px;
		width: 100%;
		background-color: #1E1E1F;
	}
	#content{
		width: 100%;
		 height: 300px;
		 background-color: #8CFF93;

	}

	.article{
		background-color: #70CC75;
		height: 250px;
		width: 100%;
	}

	#log{

		padding: 10px;
		height: 300px;
		width: 400px;
		border-radius: 5px;
		border:solid black 1px;
		background: white;

	}

	#upload{
			display: none;
		position: fixed;
	margin-left: 5%;
		padding: 10px;
		height: 300px;
		width: 400px;
		border-radius: 5px;
		border:solid black 1px;
		background: white;
	}
	input{
		padding: 10px;
		border-radius: 5px;
		display: block;
	}
	button{
		padding: 10px;
		border-radius: 5px;
	}
		
	input[type='submit']{
		background-color: #49FF9F;
	}

	.link{
		font-family: 'Amatic SC', cursive;
		font-size: 50px;
		color: #467F49;
	}
	.box{
		transition: all 0.7s ease;
		display: inline-grid;
		height: 220px;
		width: 220px;
		margin: 20px;
		background: #D8FFDA;
		padding: 1px;
	}
	.box:hover{
		transition: all 0.7s ease;
		background-color: #8CFF93;
	}
	.titleblog{
		color: white;
		font-size: 60px;
		padding-top: 5%;
		margin-left: 30%;
	}
	a{
		text-decoration: none;
	}
	strong{
		transition: all 0.7s ease;
		font-size: 50px;
	}
	footer{
		margin-top:10%;
	}
	strong:hover{
		transition: all 0.7s ease;
		color: black;
	}
	.article{
		margin: 2px;
		padding: 10px;
		color: white;
		font-size: 30px;
		width: 60%;
		margin-left: 10%;
		background-color: #6C7F6D;
		box-shadow: 15px 15px #3F4A3F;
		margin-bottom: 10%;
	}

	#content h2{
		margin-left: 10%;
		font-size: 40px;

	}

	strong{
		font-size: 28px;
	}

	div, p, strong{
		font-family: 'Open Sans Condensed', sans-serif;
	}

	.comments{
		margin-top: 5%;
		margin-left: 1%;
		padding: 25px;
		color: white;
		height: 100px;
		width: 300px;
	 

		background-color: #6C7F6D;
		box-shadow: 15px 15px #3F4A3F;
		margin-bottom: 10%;

	}

	tr, td , table {

		text-decoration: none;
		padding: 10px;
		font-family: 'Open Sans Condensed', sans-serif;
	}
	.tbl{
		background-color: white;
		text-decoration: none;
	}
	.tbl2{
		background-color: grey;
		color: white;
		text-decoration: none;
	}

	h3{
		padding-left: 111px;
		text-decoration: none;
		color: white;
		display: inline;
		font-size: 30px;
	}

	select {
		font-size: 25px;
    border:0; 
    height:32px;
    border:1px solid #d8d8d8;
    width:350px;
    -webkit-appearance: none;
	}
	a, caption {
		color: white;
	}
	h2{
		color: white;
	}
	#panneau{
		margin-left: 20%; 
	}
</style>

</head>
<body>


<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <header><a href="index.php"><h1 class="titleblog">The Blog'3st Blog</h1></a>
  	  <a href="add_post.php"><h3>- ajouter article -</h3></a>
  <a href="edit_post.php"><h3>- éditer article -</h3></a>
  <a href="admin.php"><h3>- Administration -</h3></a>
  </header>

  		<!-- FIN DU HAUT DU SITE -->

<?php foreach($posts as $post) : ?>

	<a class="link" href="/post/affiche/<?= $post -> getId_article() ?>">
		<div class="box">
			<span style="font-size:25px !important">
				<?= $post -> getTitle_article() ?>
			</span>
	 		<strong>
	 			Rédigé par - <?= $post -> getId_author() ?>
	 			<hr>
	 			Le - <?= $post -> getDate_publication() ?> <br>
	 			<?= $post -> getId_Post()?><br>
	 		</strong>
		</div>
	</a>

<?php endforeach; ?>

 		<!-- DEBUT HAUT DU FOOTER	-->

<footer>
	

</footer>
</body>
</html>