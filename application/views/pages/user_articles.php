<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3>Moji Oglasi</h3>			
			<table class="table">
			<?php foreach ($user_articles as $user_article): ?>
				<tr>
					<td>
						<a href="<?php echo site_url(); ?>article/edit/<?php echo $user_article['id'] ?>"><button class="btn btn-primary">IZMJENI</button></a>
					</td>
					<td>
						<?= $user_article['name'] ?>
					</td>
					<td>
						<a href="<?php echo site_url(); ?>article/delete/<?php echo $user_article['id'] ?>"><button class="btn btn-danger">OBRISI</button></a>
					</td>					
				</tr>
			<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
