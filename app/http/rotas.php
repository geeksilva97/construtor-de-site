<?php
//setando rotas
Route::set('inicio', 'inicio.view');
Route::set('textos', 'textos.view');
Route::set('imagens', 'imagens.view');
Route::set('posts', 'posts.view');
Route::set('noticias', 'noticias.view');
Route::set('links', 'links.view');
Route::set('error', 'error.view');

$url = (isset($_GET['url'])) ? $_GET['url'] : '';
$url = explode('/', $url);




Route::$CURRENT_VIEW = (!empty($url[0])) ? Route::get(strtolower($url[0])) : Route::get('inicio');




