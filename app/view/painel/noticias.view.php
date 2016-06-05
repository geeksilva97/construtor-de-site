<div ng-controller="noticiasController">
<div class="col-md-6">
	<h3>Notícias</h3>
	<table class="table table-condensed">
		<tbody>
			<tr ng-repeat="notice in enabled_notices">
				<td>{{notice.titulo}}</td>
				<td>{{notice.conteudo}}</td>
				<td><a href="javascript:void(0)" ng-click="disable($event)" data-id="{{notice.id_noticia}}">Disable</a></td>
			</tr>
		</tbody>
	</table>
</div>


<div class="col-md-6">
	<h3>Cadastrar uma nova notícia</h3>	

	<form>
		<div class="form-group">
			<label>Titulo da Notícia:</label>
			<input type="text" class="form-control" ng-model="noticia.titulo" placeholder="Titulo da Notícia">
		</div>

		<div class="form-group">
			<label>Conteúdo da Notícia:</label>
			<textarea class="form-control" ng-model="noticia.conteudo" placeholder="Conteúdo"></textarea>
		</div>

		<button class="btn btn-success" ng-click="add_notice(noticia)">Cadastrar Notícia</button>
	</form>

</div>

<div class="col-md-6">
	<h3>Notícias Desabilitadas</h3>
	<table class="table table-condensed">
		<tbody>
			<tr ng-repeat="notice in disabled_notices">
				<td>{{notice.titulo}}</td>
				<td>{{notice.conteudo}}</td>
				<td><a href="javascript:void(0)" ng-click="enable($event)" data-id="{{notice.id_noticia}}">Enable</a></td>
				<td><a href="javascript:void(0)" ng-click="delete($event)" data-id="{{notice.id_noticia}}">Excluir</a></td>
			</tr>
		</tbody>
	</table>
</div>

</div>