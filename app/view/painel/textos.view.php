<div ng-controller="textController">

	<div class="col-md-8">
		
		<form class="form-inline">
		<h3>Altere os textos!</h3>
			<div class="form-group">
				<label>Texto do Topo : </label>
				<input type="text" class="form-control" ng-model="texts.texto_topo" placeholder="Texto do topo">
			</div>

			<button class="btn btn-default" name="salvar" ng-click="save_text(texts)">Salvar</button>
		</form>

	</div>


</div>