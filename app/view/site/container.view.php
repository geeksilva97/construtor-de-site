<?php

//startando a conexão com o banco de dados
$conn = Conn::get();

	$file_import = 'config/import.json';

// READ config/import.json
	$standard_css = array();
	$standard_js = array();
	if(file_exists($file_import)){
		$import = json_decode(file_get_contents($file_import));
		
		if(isset($import->css)){
			$standard_css = $import->css;
		}

		if(isset($import->js)){
			$standard_js = $import->js;
		}

	}



	//INFORMAÇÕES DINAMICAS DO PAINEL DE CONTROLE	

	//TEXTOS
	$managerText = new ManagerText();
	$managerText->conn=&$conn;
	$textos = $managerText->getTextos();

	//LINKS DO MENU
	$linkManager = new ManagerLinks();
	$linkManager->conn = &$conn;

	$enabled_links = $linkManager->getActiveLinks();

	


?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $attr['title']; ?></title>
	

	<?php

		//CARREGANDO ESTILOS PADRÃO
		foreach ($standard_css as $key => $value):
			echo '<link href="'.$value.'" type="text/css" rel="stylesheet" />'."\n\r";
		endforeach;
		
		//CARREGANDO ESTILOS DINAMICOS
		foreach ($css as $key => $value):
			echo '<link href="'.$value.'" type="text/css" rel="stylesheet" />'."\n\r";
		endforeach;


		//CARREGANDO JAVASCRIPT PADRÃO
		foreach ($standard_js as $key => $value):
			echo '<script src="'.$value.'"></script>'."\n\r";
		endforeach;

		//CARREGANDO JAVASCRIPT DINAMICO
		foreach ($javascript as $key => $value):
			if(preg_match('/\w{0,}+\//', $value)){
				echo '<script src="'.$value.'"></script>'."\n\r";
			}else{
				echo '<script>'.$value.'</script>'."\n\r";
			}
		endforeach;


		

	?>

	<meta charset="utf-8" />
</head>
<body>

	
	<div class="container">
		<header>			
			<h1><?php echo $textos->texto_topo; ?></h1>
			<div class="clear"></div>
			<nav>
				<ul>
					<?php foreach($enabled_links as $link): ?>

						<li><a href=""><?php echo $link->descricao; ?></a></li>

					<?php endforeach; ?>
				</ul>
			</nav>
		</header>

		<?php
			include_once $content;
		?>

	<footer>
		<a href="#">FAQ</a>
		<a href="#">Politica de privacidade</a>
		<a href="#">Termos de uso</a>
	</footer>
</div>

<?php
	$conn->close();//encerrando a conexão com o banco de dados
?>
	
</body>
</html>
