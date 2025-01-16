jQuery(document).ready(function() {
	
	if (jQuery('.remove-row-class').length) {
		jQuery('.remove-row-class').each(function(){
			//jQuery(this).children(".container").removeClass("container");
			jQuery(this).children(".container").children(".row").removeClass("row");
		});
		
		
	}
	
	if (jQuery('.remove-container-class').length) {
		jQuery('.remove-container-class').each(function(){
			jQuery(this).children(".container").removeClass("container");
		});
		
	}
	if (jQuery('.form-contact-business-2').length) {
		jQuery('.form-contact-business-2').each(function(){
			jQuery(this).children(".webform-elements").addClass("row");
			jQuery(this).find(".webform-section-wrapper").addClass("row");
		});
		
	}
	if (jQuery('.animated-box-back').length) {
		jQuery('.animated-box-back').each(function(){
			var url = jQuery(this).attr("bgimg");
			jQuery(this).css('background-image',
 'url("'+url+'")');
		});
		
	}
	
	if (jQuery('.progress-box').length) {
		jQuery('.progress-box').each(function(){
			var aria = jQuery(this).children(".progress").children(".progress-bar").attr("aria-valuenow");
			jQuery(this).children(".progress").children(".progress-bar").css("width",aria+"%");
			
		});
		
	}
	if (jQuery('.form-search').length) {
		jQuery('.form-search').each(function(){
			var ttle = jQuery(this).attr("title");
			jQuery(this).attr("placeholder",ttle);
			
		});
	}
	if (jQuery('.feature-box-image').length) {
		jQuery('.feature-box-image').each(function(){
			var img = jQuery(this).attr("background-img");
			jQuery(this).css('background-image',
 'url("'+img+'")');
			//alert(img);
			
		});
	}
	
	
	//Set subtitle
	if (jQuery('.section').length) {
		jQuery('.section').each(function(){
			
			if(jQuery(this).attr("data-sub-title")){
				var subtitle = jQuery(this).attr("data-sub-title");
			
				if (subtitle !== ''){
					jQuery(this).find(".subtitle-section").html(subtitle);
				}
			}else{
				jQuery(this).find(".subtitle-section").hide();
			}
			
			if(jQuery(this).attr("data-title")){
				var dttitle = jQuery(this).attr("data-title");
			
				if (dttitle !== ''){
					jQuery(this).find(".title-section").html(dttitle);
				}
			}
			
			//desction section 
			if(jQuery(this).attr("data-block-desc")){
				var desc_section = jQuery(this).attr("data-block-desc");
			
				if (desc_section !== ''){
					jQuery(this).find(".desc-section").html(desc_section).show();
					
				}
			}
			
			
		});
		
	}
	if (jQuery('.homepage.path-taxonomy').length) {
		jQuery(".homepage.path-taxonomy").find(".views-row").addClass("col-sm-6 col-lg-6");
	}
	
	
});
