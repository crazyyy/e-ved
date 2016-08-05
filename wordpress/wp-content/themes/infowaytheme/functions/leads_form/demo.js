	jQuery(document).ready(function(){
		   		jQuery('#save_arrange').click(function(){
				jQuery("#save-load").css("display", "block");
				var arrInputValues = new Array();
				var arrIdValues = new Array();
				var UpperArrIdValues = new Array();
				var UpperArrField = new Array();
				jQuery('.field_txt_name').each(function(){
				UpperArrField.push(jQuery(this).text());
				});
				jQuery('.field_arrange').each(function(){

			UpperArrIdValues.push(jQuery(this).val());
				});
			jQuery('.arrange').each(function(){
			// alert(jQuery(this).val());
			arrIdValues.push(jQuery(this).next('.hname').val());
		    arrInputValues.push(jQuery(this).val()); 
			});
		/*jQuery.each(arrInputValues, function(index, value) {
            alert(value);
        });*/
			jQuery.ajax({
			type: 'POST',
			url: MyAjax.ajaxurl,
			data: {"action": "arrange_update", "arr_arrange": arrInputValues, "id_arrange":arrIdValues, "outer_ids":UpperArrIdValues, "field_name": UpperArrField},
            success: function(response){
				jQuery("#save-load").css("display", "none");
				//alert(response);
				//location.reload();
            }
	});

		});
	});
