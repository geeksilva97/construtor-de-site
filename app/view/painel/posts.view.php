<?php
	$postManager = new ManagerPosts();
	$postManager->conn = &$conn;
	$active_posts = $postManager->getActives();

?>

<div ng-controller="postController">

<div class="col-md-6">

	<h3>Posts Ativos</h3>

	<table class="table table-condensed">
		<tbody>
			<tr ng-repeat="post_enabled in enabled_posts">
				<td>{{post_enabled.titulo}}</td>
				<td><a href="javascript:void(0)" data-id="{{post_enabled.id_post}}">View</a></td>
				<td><a href="javascript:void(0)" data-id="{{post_enabled.id_post}}" ng-click="disable($event)">Disable</a></td>
			</tr>
		</tbody>
	</table>
</div>


<div class="col-md-6">
	<h3>Cadastrar Novo Post</h3>


<form method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" class="form-control" ng-model="post.titulo">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Subtitulo:</label>
			<input type="text" class="form-control" ng-model="post.sub_titulo">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Conteúdo do Post:</label>
			<textarea class="form-control" ng-model="post.conteudo"></textarea>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Descrição:</label>
			<input type="text" class="form-control" ng-model="post.descricao">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Chave:</label>
			<input type="text" class="form-control" ng-model="post.chave">
		</div>
	</div>

	<div class="col-md-6">
		<label><input type="checkbox" name="adiciona-site" ng-model="post.ativo"> Adicionar ao site?</label>
	</div>

	<div class="col-md-12">
		<button class="btn btn-success" ng-click="add_post(post)">Cadastrar Post</button>
	</div>
</form>

</div>


<div class="col-md-6">
	<h3>Posts Desabilitados</h3>

	<table class="table table-condensed">
		<tbody>
			<tr ng-repeat="post_disabled in disabled_posts">
				<td>{{post_disabled.titulo}}</td>
				<td><a href="javascript:void(0)" ng-click="enable($event)" data-id="{{post_disabled.id_post}}">Enable</a></td>
				<td><a href="javascript:void(0)" data-id="{{post_disabled.id_post}}">Delete</a></td>
			</tr>
		</tbody>
	</table>

</div>



</div>
