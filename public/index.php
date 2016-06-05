<?php
chdir('../');
//inclui as classes de forma dinamica
include 'config/autoloader.php';
include 'app/http/rotas.php';

	$titles = array(
		'inicio'=>'Bem vindo ao site Comidinha',
		'error'=>'Erro 404 Página não encontrada | Kit de Desenvolvimento'
	);


	$route = str_replace('.view', '', Route::$CURRENT_VIEW );


	if( empty( Route::get( $route ) ) ){
		Route::$CURRENT_VIEW = Route::get('error');
		$route = str_replace('.view', '', Route::$CURRENT_VIEW );
	}
	
	View::view(
		Route::$CURRENT_VIEW,// view corrente
		array('title'=>(isset($titles[$route])) ? $titles[$route] : '')// atributos dessa view
	);

	View::addPath('site/');

	View::load();//carregando a view
	
