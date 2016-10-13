/**
 *  App Class
 *
 *  @created		10/13/2016
 *  @author			Carl Victor Fontanos
 *  @author_url		www.carlofontanos.com
 */

/**
 * Setup a App namespace to prevent JS conflicts.
 */
var app = {
		
    /**
     * Product
     */
    Product: function () {
		
		/**
		 * This method contains the list of functions that needs to be loaded
		 * when the "Auction" object is instantiated.
		 *
		 */
		this.init = function() {
			this.ajax_create_product();
			this.ajax_show_products();
		}
		
		/**
		 * AJAX submit update auction.
		 */
		this.ajax_create_product = function() {
			var _this = this;
			
			$('.create-product').ajaxForm({
				beforeSerialize: function() {
					// wave_box('on');
				},
				success: function(response, textStatus, xhr, form) {
					if(response.status == 0){
						if($.isArray(response.errors)){
							$.each(response.errors, function (key, error_nessage) {
								Lobibox.notify('error', {msg: error_nessage, size: 'mini', sound: false});
							});
						} else {
							Lobibox.notify('success', {msg: response.message, size: 'mini', sound: false});
						}
							
					}
					if(response.status == 1){
						_this.ajax_show_products();
						Lobibox.notify('success', {msg: response.message, size: 'mini', sound: false});
					}
					// wave_box('off');
				}
            });
		}
		
		this.ajax_show_products = function() {
			
			$.ajax({
				url: './show',
				headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
				data: { get: 'products' },
				type: 'POST',
				datatype: 'JSON',
				success: function (resp) {
					$('.products-data').html(resp.message);
				}
			});
			
		}
	}
}

/**
 * When the document has been loaded...
 *
 */
jQuery(document).ready( function () {
		
	product = new app.Product(); // Instantiate the Product Class
	product.init(); // Load Product class methodsds
	
});