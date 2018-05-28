<?php foreach($articles as $article) : ?>
	<div>
	<a class="link" href="<?= $article -> getId_article() ?>">
	  <h2><?= $article -> getTitle_article() ?></h2></a>
      <h5><span style="color: black;" class="glyphicon glyphicon-time"></span> Poster par  <?= $article -> getDate_publication()?></h5>
      <h5><span class="label label-danger">Linux</span> <span class="label label-primary">MACOS</span></h5><br>
   
      	<hr>
         <p class="content_article">
      		 <?php 
    	$content = strlen($article -> getContent());
    	$test = substr($article -> getContent(), 0, 100);
    	echo $test;
    	if ($content >= "100") {
    		
    		 echo $test."...";
    		 echo "<br><br><a class='link2' href='".$article -> getId_article()."'>En savoir plus</a>";
    	}
    	else
    		echo"Cassé";
    ?>
      	</p>
      <br><br>
    </div>
    <hr> 
   

<?php endforeach; ?>









