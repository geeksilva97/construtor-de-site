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



	
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Painel de Controle</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="inicio">Inicio <span class="sr-only">(current)</span></a></li>
        <li><a href="textos">Textos</a></li>
        <li><a href="links">Links</a></li>
        <li><a href="imagens">Imagens</a></li>
        <li><a href="posts">Posts</a></li>
        <li><a href="noticias">Notícias</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="col-md-12">
	<?php
		include_once $content;
	?>
</div>

<?php
	//encerrando conexão com o banco de dados
?>
	
</body>
</html>
