<?php foreach($articles as $article) : ?>
 
 <div class="card mb-4">
 
            <img class="card-img-top" src="upload/<?= $article -> getImg_article() ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?= $article -> getTitle_article() ?></h2>
              <p class="card-text">
              <?php 
              $content = strlen($article -> getContent());
              $test = substr($article -> getContent(), 0, 100);
              echo $test;
              if ($content >= "100") {
                
                 echo $test."&nbsp;&nbsp;...<br><br>";             
                 // echo'<a class="link" href="view_articles.php?id_article='.$article ->getId_article().'"><div class="box"></a>'; 
                 
                 // echo "<br><br><a class='btn btn-primary' href=affiche?id_article=".$article ->getId_article()".>En savoir plus</a>";
              }
              else{
                echo"Cassé";
              }
              ?>
              <a class="link" style="background-color: blue; color: white!important; padding:8px;"  href="affiche/<?= $article -> getId_Article()?>">En Savoir Plus</a>
            </p>
               
            </div>
            <div class="card-footer text-muted">
              Posted on <?= $article -> getDate_publication()?> by
              <a href="#"></a>
            </div>
          </div>  
<hr>
<?php endforeach; ?>








