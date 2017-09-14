var manageCategoriesTable;

$(document).ready(function(){
	// top bar active
	$("#navCategories").addClass('active');
	// manage categories table
	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchCategories.php',
		'order' : []
	});

	$("#addCategoriesModalBtn").unbind('click').bind('click', function(){
	 // reset the form text
	 $("#submitCategoriesForm")[0].reset();
		// remove the error text
	 	$(".text-danger").remove();
		 	// remove the form error
		 	$('.form-group').removeClass("has-error").removeClass("has-success");
				$("#submitCategoriesForm").unbind('submit').bind('submit', function(){
				  $(".text-danger").remove();
		 		   // remove the form error
		 		   $('.form-group').removeClass("has-error").removeClass("has-success");
					var categoriesName = $("#categoriesName").val();
					var categoriesStatus = $("#categoriesStatus").val();
					if(categoriesName == ""){
						$("#categoriesName").after('<p class="text-danger"> Category Name field is required</p>');
						$("#categoriesName").closest('.form-group').addClass('has-error');
					 	}else{
	  				 		$("#categoriesName").find('.text-danger').remove();
	  				 		$("#categoriesName").closest('.form-group').addClass('has-success');
	  				 	}
	  		 	if(categoriesStatus == ""){
	  			 	$("#categoriesStatus").after('<p class="text-danger"> Category Status field is required</p>');
	  			 	$("#categoriesStatus").closest('.form-group').addClass('has-error');
	  				 	}else{
	  				 		$("#categoriesStatus").find('.text-danger').remove();
	  				 		$("#categoriesStatus").closest('.form-group').addClass('has-success');
	  				 	}
	  				 	 if (categoriesName && categoriesStatus){
	  				 	 	
	  				 		var form = $(this);
	  				 			// button loading
	  				 		 $("#createCategoriesBtn").button('loading');
	  				 		 	$.ajax({
	  				 		 		url: form.attr('action'),
	  				 		 		type: form.attr('method'),
	  				 		 		data: form.serialize(),
	  				 		 		dataType: 'json',
	  				 		 		success: function(respone){
	  				 		 			
	  				 		// 			// button LOADING
	  				 		 			$("#createCategoriesBtn").button('reset');
	  				 						if(response.success == true){
	  				 		 					// reload the manage member table
	  				 							manageCategoriesTable.ajax.reload(null, false);
	  				 							// alert('ok');
	  				 		 						// reset the form text
	  				 		 						$("#submitCategoriesForm")[0].reset();
	  				 		 							// remove the error text
	  				 		 							$(".text-danger").remove();
	  				 		 								// remove the form error
	  				 		 								$(".form-group").removeClass('has-error').removeClass('has-success');
									
 				 				 								$("#add-categories-messages").html('<div class="alert alert-success">' +
		 							 							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		 							 							  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>'+ response.messages +
		 							 								'</div>');
			 				 	 									$(".alert-success").delay(500).show(10, function(){
	  				 		 											$(this).delay(3000).hide(10, function(){
	  				 		 												$(this).remove();
	  				 		 											});
	  				 		 										}); // alert
	  				 		 				} // if
	  				 		 			} // success
	  				 		 	}); //ajax
	  				 	} // if
					return false;
			}); // submit categories
	}); // on click categories


}); // document

