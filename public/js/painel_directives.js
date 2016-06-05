admPanel.directive("disable", function(){

	return {
		link : function(scope, element, attrs, http){
			
		    element.on('click', function(){
		    	var id = element.attr('data-id');

		    	var url = scope.url_ajax+"?action=disable-link&id-link="+id;


		    	scope.http_object.get(url).success(function(data){
		    		alert(data);
		    	});


		    });

		}
	}

});



admPanel.directive("enable", function(){

	return {
		link : function(scope, element, attrs, http){
			
		    element.on('click', function(){
		    	var id = element.attr('data-id');

		    	var url = scope.url_ajax+"?action=enable-link&id-link="+id;


		    	scope.http_object.get(url).success(function(data){
		    		alert(data);
		    	});


		    });

		}
	}

});