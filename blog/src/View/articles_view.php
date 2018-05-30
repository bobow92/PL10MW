<?php foreach($articles as $article) : ?>
 
 <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?= $article -> getTitle_article() ?></h2>
              <p class="card-text">
              <?php 
              $content = strlen($article -> getContent());
              $test = substr($article -> getContent(), 0, 100);
              echo $test;
              if ($content >= "100") {
                
                 echo $test."...<br><br>";
                 echo "<a class='btn btn-primary'>En Savoir Plus</a>";
                 // echo "<br><br><a class='btn btn-primary' href=affiche?id_article=".$article ->getId_article()".>En savoir plus</a>";
              }
              else
                echo"Cassé";
              ?>
              
            </p>
               
            </div>
            <div class="card-footer text-muted">
              Posted on <?= $article -> getDate_publication()?> by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>  
<hr>
<?php endforeach; ?>









