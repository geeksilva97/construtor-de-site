<div ng-controller="linksController">

	<div class="col-md-6">
	<h3>Links Ativos</h3>
		<table class="table table-condensed">
		<tbody class="enabled_links">
			<tr ng-repeat="link_enabled in enabled_links">
				<td>{{link_enabled.descricao}}</td>
				<td><a href="javascript:void(0)" data-toggle="modal" data-target="#editar-link" data-id="{{link_enabled.id_link}}">Edit</a></td>
				<td><a href="javascript:void(0)" ng-click="disable($event)" data-id="{{link_enabled.id_link}}">Disable</a></td>
			</tr>
		</tbody>
	</table>
	</div>

	<div class="col-md-6">
	<h3>Links Desabilitados</h3>
		<table class="table table-condensed">

		<tbody ng-repeat="link_disabled in disabled_links">
			<td>{{link_disabled.descricao}}</td>
			<td><a href="javascript:void(0)" ng-click="enable($event)" data-id="{{link_disabled.id_link}}">Enable</a></td>
		</tbody>
	</table>
	</div>

	<div class="col-md-12">
		<a href="nova-pagina"><button class="btn btn-default">Adicionar uma nova página</button></a>
	</div>


</div>


<!-- Modal de Edição de link -->
<div class="modal fade" id="editar-link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Link</h4>
      </div>
      <div class="modal-body">
        
      	<form>
      		
      		<div class="form-group">
      			<label>Label:</label>
      			<input type="text" class="form-control" placeholder="Label do link">
      		</div>

      		<div class="form-group">
      			<label>URL:</label>
      			<input type="text" disabled="" class="form-control" placeholder="URL do link">
      		</div>

      		<div class="form-group">
      			<label>Titulo:</label>
      			<input type="text" class="form-control" placeholder="Titulo">
      		</div>

      	</form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-success">Salvar Alterações</button>
      </div>
    </div>
  </div>
</div>