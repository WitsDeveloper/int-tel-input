/**
 * @Package int-tel-input
 * @Credit Jack O'Connor
 *
 * A JavaScript plugin for entering and validating international telephone numbers. 
 */
(function ($) {
	'use strict';
	$(document).ready(function () {		
		var telInput = $("input[type='tel'], .is_phone, #billing_phone, #_billing_phone");
		telInput.intlTelInput({
			initialCountry: "auto",
			 geoIpLookup: function(callback) {
				 $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
				 var countryCode = (resp && resp.country) ? resp.country : "";
				 callback(countryCode);
				 });
			 },
			nationalMode: false,
			preferredCountries: ['ke', 'ug', 'tz', 'et', 'bi', 'rw', 'cd', 'ss'],
			utilsScript: iti_object_url.iti_root_url + "build/js/utils.js"
		});
	});
})(jQuery);