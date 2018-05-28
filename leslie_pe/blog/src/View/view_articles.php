<?php foreach($articles as $article) : ?>

	<a class="link" href="/post/affiche/<?= $post -> getId_article() ?>">
		<div class="box">
			<span style="font-size:25px !important">
				<?= $article -> getTitle_article() ?>
			</span>
	 		<strong>
	 			Rédigé par - <?= $article -> getId_author() ?>
	 			<hr>
	 			Le - <?= $article -> getDate_publication() ?> <br>
	 			<?= $article -> getId_article()?><br>
	 		</strong>
		</div>
	</a>

<?php endforeach; ?>
