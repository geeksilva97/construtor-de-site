<?php
	//POSTS
	$postManager = new ManagerPosts();
	$postManager->conn = &$conn;
	$active_posts = $postManager->getActives();

	//NOTICIAS
	$noticeManager = new ManagerNotice();
	$noticeManager->conn = &$conn;
	$active_notices = $noticeManager->getActives();

	//IMAGENS
	$imageManager = new ManagerImages();
	$imageManager->conn = &$conn;
	$active_images = $imageManager->getActives();
?>
	<!-- SLIDE -->
	<div id="slider">
		<?php foreach($active_images as $image): ?>
			<a href="#"><img src="<?php echo $imageManager->path.'/'.$image->src; ?>" alt="<?php echo $img->descricao; ?>"></a>
		<?php endforeach; ?>
	</div>
	<!-- FIM SLIDE -->
	<div class="clear"></div>
	<section class="ladoDir">
	<?php foreach($active_posts as $post): ?>

			<div class="post">
				<h1><?php echo $post->titulo; ?></h1>
				<img src="img/img2.png" alt="" legend="" />
				<h2><?php echo $post->sub_titulo; ?></h2>
				<h3>POST#</h3>
				<p><?php echo $post->conteudo; ?></p>
				<a href="post/<?php echo $post->chave; ?>"><button name="mais">Leia mais</button></a>
			</div>

	<?php endforeach; ?>

	</section>

	<section class="ladoEsq">

		<div class="info">	
			<h1>NOTICIAS</h1>
			<br/>
			<?php foreach($active_notices as $notice): ?>
			<p><?php echo $notice->conteudo; ?></p>
			<?php endforeach; ?>
		</div>
	</section>
	<div class="clear"></div>
