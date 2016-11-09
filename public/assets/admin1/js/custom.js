$(document).ready(function(){


	$('#upload_image').on('click', function(){
		alert('test');
		$('#upload_image').css('opacity', '0.8');

	});

	$('#dob').datepicker({
	    autoclose: true,
	    format: 'yyyy-mm-dd'
	  });

});