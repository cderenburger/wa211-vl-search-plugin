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
		source: citiespath+"php/211search_cities.php", 
		select: function(event, ui){
			$("#city").val(ui.item.city);
			//$("#geocoor").val(ui.item.geocoor);
			//$("#region").val(ui.item.region);
			//$("#email-211").val(ui.item.email);
			//$("#user-location").val(ui.item.city);
      $("#zip").val(ui.item.zip);
			var location =  $("#city").val();
      var zip =  $("#zip").val();
			//var geocoor = $("#geocoor").val();
			//var region = $("#region").val();
			//var email = $("#email-211").val();
			//var userlocation = $("#user-location").val();
			var domain1 = "%7B%22service%5C%5Cservice_taxonomy%5C%5Cmodule_servicepost%22%3A%7B%22value%22%3A%5B%7B%22taxonomy_id%22%3A" ;
			var domain2 = "-ta_id_null%22%7D%5D%2C%22operator%22%3A%5B%22contains_array%22%5D%7D%2C%22site%5C%5Csite_addressus%5C%5Csite_addressus%22%3A%7B%22site%5C%5Csite_addressus%5C%5Csite_addressus%5C%5Czip%22%3A%7B%22value%22%3A%22" ;
			var domain3 = "%22%2C%22operator%22%3A%5B%22orderbyasc%22%5D%7D%7D%2C%22agency%5C%5Cagency_system%5C%5Cname%22%3A%7B%22value%22%3A%22%22%2C%22operator%22%3A%5B%22notequals%22%5D%7D%7D?" ;
			//var geoloc = "&loc=";
			//var amp = "&".replace(/#038;/g,"");
		console.log(location);
			$("a[href^='https://wa211.communityos.org/searchresults/render/ds/']").not("a[href^='https://wa211.communityos.org/searchresults/render/ds/CHANGEME']")
			.each(function(){
			this.href = "https://wa211.communityos.org/searchresults/render/ds/" +domain1+$(this).attr('data-relativeurl')+"%2C%22__react_key%22%3A%22ta_id_"+$(this).attr('data-relativeurl')+domain2+zip+domain3;
			});
			$("a[href^='https://www.resourcehouse.info/win211/Search/Topics/']").not("a[href^='https://www.resourcehouse.info/win211/CHANGEME']")
			.each(function(){
			 if ($(this).attr('data-relativeurl').indexOf('?') > -1)
				{
					this.href = "https://www.resourcehouse.info/win211/Search/Topics/"+$(this).attr('data-relativeurl')+amp+"loc="+location+amp+"geo="+geocoor+amp+"reg="+region+amp+"o=distance-asc";
				} else
				{
					this.href = "https://www.resourcehouse.info/win211/Search/Topics/"+$(this).attr('data-relativeurl')+"?"+amp+"loc="+location+amp+"geo="+geocoor+amp+"reg="+region+amp+"o=distance-asc";
				}
			});
		},
		minLength:1
	};
	var ac_keyword = {
		source: citiespath+"php/211search_keywords.php",
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
