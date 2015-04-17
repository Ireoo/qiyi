(function($) {
	$.fn.city = function(options) {
		this.attr('readonly', 'readonly')
		.click(
			function() {
				alert(1);
			}
		)
	}
})(jQuery);
