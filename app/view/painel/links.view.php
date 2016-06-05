<div ng-controller="linksController">

	<div class="col-md-6">
	<h3>Links Ativos</h3>
		<table class="table table-condensed">
		<tbody class="enabled_links">
			<tr ng-repeat="link_enabled in enabled_links">
				<td>{{link_enabled.descricao}}</td>
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

</div>