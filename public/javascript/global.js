/**
 * Helper function to easily scroll to the top of the page
 * 
 * @param element
 */
function scroll_top( element ){
	if( element.length ) {
		jQuery('html, body').animate({scrollTop: jQuery(element).offset().top-100}, 150);
	}
}

/**
 * Helper function to get append the loading image to message container when submitting via AJAX
 * 
 * @param message_container
 */
function loading_img( message_container ) {
	$(message_container).html('<img src = "' + base_url + 'img/loading.gif' + '" />');
}

/**
 * Helper function to get append the loading image to message container when submitting via AJAX
 * 
 * @param textarea, height
 */
function load_ckeditor( textarea, height ) {			
	CKEDITOR.config.allowedContent = true;
	CKEDITOR.replace( textarea, {
		toolbar: null,
		toolbarGroups: null,	
		height: height
	});
}
		
/**
 * Helper function to command CKEditor to update the instancnes before performing the AJAX call.
 * This will populate the hidden textfields with the proper values coming from the CKEditor 
 *
 */
function update_ckeditor_instances() {
	for ( instance in CKEDITOR.instances ) {
		CKEDITOR.instances[instance].updateElement();
	}
}

/**
 * Provides a highlight effect with options.
 * It also executes even though the browser / tab is not active. 
 * 
 */
function highlight_effect(element, color, speed) {
	jQuery(element).effect("highlight", { color: color }, speed, function () {
		$(this).stop(true, true);
	});
}