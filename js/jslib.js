	$(function() {
		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				OK: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});