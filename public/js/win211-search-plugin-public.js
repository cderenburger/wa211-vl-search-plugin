(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

$(document).ready(function(){
	var citiespath = citiesUrl.citiesUrl ;
	var ac_cities = {
		source: citiespath+"/win211-search-plugin/public/php/demo_cities.php", 
		select: function(event, ui){
			$("#city").val(ui.item.city);
			$("#geocoor").val(ui.item.geocoor);
			var location =  $("#city").val();
			var geocoor = $("#geocoor").val();
			var domain = "www.resourcehouse.com/win211" ;
			var geoloc = "&loc=";
			var amp = "&".replace(/#038;/g,"");
		console.log(location);
			$("a[href^='https://www.resourcehouse.info/win211/Search?']").not("a[href^='https://www.resourcehouse.info/win211/CHANGEME']")
			.each(function(){
			this.href = "https://www.resourcehouse.info/win211/Search?" + $(this).attr('data-relativeurl')+amp+"loc="+location+amp+"geo="+geocoor;
			});
		},
		minLength:1
	};
	var ac_keyword = {
		source: citiespath+"/win211-search-plugin/public/php/demo_keywords.php",
		select: function(event, ui){
			$("#taxname").val(ui.item.taxval);
			var taxonomyname = $("#taxval").val();
			var amp = "&".replace(/#038;/g,"");
		console.log(taxname);
		},
		minLength:1
	};
		$("#city").autocomplete(ac_cities);
		$("#taxname").autocomplete(ac_keyword);
});

})( jQuery );
