<?php
//startando a conexão com o banco de dados
$conn = Conn::get();


	$file_import = 'config/painel_import.json';

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



?>
<!DOCTYPE html>
<html ng-app="admPanel">
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
<body ng-controller="admPanelController">

<?php
	include 'config/header.php';
?>

<div class="col-md-12">
	<?php
		include_once $content;
	?>
</div>

<?php
	// include 'footer.php';
?>
	
</body>
</html>
