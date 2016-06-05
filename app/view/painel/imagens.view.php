<?php
	$imageManager = new ManagerImages();
	$imageManager->conn = &$conn;
	$active_images = $imageManager->getActives();

?>

<h2>Imagens Atuais</h2>
	
	<table class="table table-condensed">
		<tbody>
			
			<?php foreach($active_images as $image): ?>
				<tr>
					<td><?php echo $image->id_img; ?></td>
					<td><img class="col-md-5" src="<?php echo $imageManager->path.'/'.$image->src; ?>"></td>
					<td><i class="glyphicon glyphicon-ban-circle" title="Desabilitar" style="cursor: pointer;"></i>
				</tr>

			<?php endforeach; ?>

		</tbody>
	</table>


<br />
<!-- <br /> -->

<h2>Adicionar</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Selecione um arquivo de imagem:</label>
		<input type="file" name="file-image">
	</div>

	<div class="form-group">
		<label>Descrição da imagem:</label>
		<input type="text" class="form-control" name="desc-image" placeholder="Informe do que se trata a imagem">
	</div>

	<button class="btn btn-success" name="add">Add</button>
</form>

<?php


	if(isset($_POST['add'])){
		$name = time();

		if(move_uploaded_file($_FILES['file-image']['tmp_name'], 'public/img/'.$_FILES['file-image']['name'])){
			
			$attr = new stdClass;

			$attr->src = $_FILES['file-image']['name'];
			$attr->descricao = $_POST['desc-image'];


			echo $imageManager->add($attr);
		}

		
	}
?>

<br />
<br />