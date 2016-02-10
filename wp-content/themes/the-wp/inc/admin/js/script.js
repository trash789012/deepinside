( function( $ ) {
	$(document).ready(function($){
	
		$('#accordion-section-pro .accordion-section-content').show();
		$('#accordion-section-pro').addClass("open");
		
		// Services Section: Preview Selected Icon
		$('#accordion-section-services select').on('change', function(e){
			var optionSelected = $(this).find("option:selected").val();
	
			$(this).parent().parent().find('i.fa').hide();
			$(this).before("<i class='dinozoom fa-5x fa "+optionSelected+"'></i>");
			
		});
	
	});
} )( jQuery );